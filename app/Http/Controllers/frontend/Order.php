<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PDF;



class Order extends Controller
{
    public function index()
    {   
        return view('frontend.order');
    }

    public function payment(Request $request,$id)
    {   
        $order = DB::table('t_order')
            ->select('t_order.*','d_catalog.*',
            't_order.id AS ordered_id',
            't_payment.order_id AS orders_id',
            't_payment.id AS pay_id'
            )
            ->leftJoin('d_catalog','d_catalog.id', '=', 't_order.category_id')
            ->leftJoin('t_payment','t_payment.order_id', '=', 't_order.id')
            ->where('t_order.order_id', '=', $id)
            ->first();
        
        $bank = DB::table('m_bank')
            ->select('*')
            ->first();
            
        return view('frontend.payment',['orders' => $order,'bank' => $bank]);
    }

    public function paymentList(Request $request)
    {   
        // $order = DB::table('t_order')
        //     ->select('*')
        //     ->leftJoin('d_catalog','d_catalog.id', '=', 't_order.category_id')
        //     ->where('user_id', '=', session('user_id'))
        //     ->get();
        $orders = DB::table('t_order')
        ->select('t_payment.*','t_order.fix_price as price','t_order.order_id as order_id', 'm_catalog.catalog_name AS catalog_name', 
                'd_catalog.category_name AS category_name',
                'd_catalog.category_code AS cat_id',
                't_order.status AS status',
                't_order.created_at AS created_ats',
                't_order.updated_at AS updated_ats',
                't_payment.status AS pay_status',
                'm_bank.bank_name')
        ->leftJoin('t_payment', 't_order.order_id', '=', 't_payment.id')
        ->leftJoin('m_catalog', 'm_catalog.id', '=', 't_order.catalog_id')
        ->leftJoin('d_catalog', 't_order.category_id', '=', 'd_catalog.id')
        ->leftJoin('m_bank', 'm_bank.id', '=', 't_payment.bank')
        ->where('t_order.user_id', '=', session('user_id'))
        ->latest()->paginate(10);
            
        return view('frontend.paymentlist',['orders' => $orders]);
    }

    public function storeOrder(Request $request)
    {	
        if ($request->isMethod('post')) {
            
            $random = strtoupper(Str::random(7));

            $rules = [
                'firstname' => 'required|string|min:3|max:255',
                'lastname' => 'required|string|min:3|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|numeric',
                'address' => 'required|string|max:255',
                'city' => 'required|string',
                'zip_code' => 'required|numeric',
                
            ];
            
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                dd($validator);
                return redirect('register')
                ->withInput()
                ->withErrors($validator);
            }
            else{
                $data = $request->input();
                $generate = '0'.$data['user_id'].date('ymd').$random;
                $orderid = '';
                if($data['catalog_id'] == 1){
                    $orderid = 'BRM'.$generate;
                }elseif($data['catalog_id'] == 2){
                    $orderid = 'BDP'.$generate;
                }else{
                    $orderid = 'BBS'.$generate;
                }

                
                DB::table('t_order')->insert([
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'zip_code' => $data['zip_code'],
                    'fix_price' => $data['fix_price'],
                    'order_id' => $orderid,
                    'catalog_id' => $data['catalog_id'],
                    'category_id' => $data['category_id'],
                    'user_id' => $data['user_id'],
                    'status' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                return redirect('payment/'.$orderid)->with('status',"Insert successfully");
            }
        }else{
            dd($request->method());
        }
        
    }

    public function uploadStruk(Request $request){
        $data = $request->input();
        $this->validate($request, [
            'filename' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
     
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('filename');
     
        $nama_file = session('firstname')."_".session('lastname')."_".time()."_".$file->getClientOriginalName();
     
              // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        $check = DB::table('t_order')
        ->select('*')
        ->where('id', $data['order_id'])
        ->first(); 

        $checks = DB::table('t_payment')
        ->select('*')
        ->where('id', $data['pay_id'])
        ->first(); 

        if($check != null && $checks != null){
            DB::table('t_order')
            ->where('id', $data['order_id'])
            ->update(array('status' => 1,'updated_at' => date('Y-m-d H:i:s'))); 

            DB::table('t_payment')
            ->where('id', $data['order_id'])
            ->update(array('status' => 0,'filename' => $nama_file,'updated_at' => date('Y-m-d H:i:s'))); 
        }else{
            DB::table('t_payment')->insert([
                'order_id' => $data['order_id'],
                'catalog_id' => $data['catalog_id'],
                'user_id' => $data['user_id'],
                'status' => 0,
                'bank' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'price' => $data['price'],
                'filename' => $nama_file,
            ]);
        }
        
        

        DB::table('t_order')
        ->where('id', $data['order_id'])
        ->update(array('status' => 1,'updated_at' => date('Y-m-d H:i:s'))); 
     
        return redirect('payment');
    }

    public function generatePDF($id)
    {   
        $orders = DB::table('t_order')
        ->select('t_payment.*','t_order.fix_price as price','t_order.order_id as order_id', 'm_catalog.catalog_name AS catalog_name', 
                'd_catalog.category_name AS category_name',
                'd_catalog.category_code AS cat_id',
                'd_catalog.price AS real_price',
                'd_catalog.discount AS discount',
                't_order.catalog_id AS cats_id',
                't_order.status AS status',
                't_order.address AS address',
                't_order.phone AS phone',
                't_order.id AS orders_id',
                't_order.created_at AS created_ats',
                't_order.updated_at AS updated_ats',
                't_payment.status AS pay_status',
                'users.name AS user_name',
                'users.email AS user_email',
                'users.phone AS user_phone',
                'm_bank.bank_name')
        ->leftJoin('t_payment', 't_order.order_id', '=', 't_payment.id')
        ->leftJoin('m_catalog', 'm_catalog.id', '=', 't_order.catalog_id')
        ->leftJoin('d_catalog', 'm_catalog.id', '=', 'd_catalog.catalog_id')
        ->leftJoin('m_bank', 'm_bank.id', '=', 't_payment.bank')
        ->leftJoin('users', 'users.id', '=', 't_order.user_id')
        ->where('t_order.order_id', '=', $id)
        ->first();

        if($orders->cats_id == 1){
            $orderid = 'BRM';
        }elseif($orders->cats_id == 2){
            $orderid = 'BDP';
        }else{
            $orderid = 'BBS';
        }

        $invoice = 'INV/DP/'.date('y').'/'.$orderid.'/'.$orders->orders_id;
        $data = [
            'orders' => $orders,
            'inv_id' => $invoice
        ];
        
            
        // return view('frontend/invoice',['orders' => $orders,'inv_id' => $invoice]);
        
        $pdf = PDF::loadView('frontend/invoice', $data);
    
        return $pdf->download($invoice.'.pdf');
    }
}

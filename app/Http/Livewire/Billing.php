<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PDF;

class Billing extends Component
{
    use WithPagination;
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
        ->where('t_order.id', '=', $id)
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

    public function render(Request $request)
    {
        return view('livewire.order',[
            'orders' => Order::leftJoin('d_catalog', 'd_catalog.id', '=', 't_order.catalog_id')
            ->leftJoin('m_catalog', 'm_catalog.id', '=', 'd_catalog.catalog_id')
            ->select('t_order.*', 'm_catalog.catalog_name AS catalog_name', 
                    'd_catalog.category_name AS category_name',
                    'd_catalog.category_code AS cat_id')->latest()->paginate(10),
        ]);
    }
    
}

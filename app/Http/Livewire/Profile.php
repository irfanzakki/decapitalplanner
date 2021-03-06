<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PDF;


use App\Models\User;

class Profile extends Component
{   
    public $start;
    public $end;
    public function downloadPDF(Request $request){
        
            // 't_payment.*','t_order.fix_price as price',
            
                // 't_payment.status AS pay_status',
                // 'm_bank.bank_name'
                // dd($request->start);
                
        $orders = DB::table('t_order')
        ->select('t_order.id as id','t_order.order_id as order_id', 'm_catalog.catalog_name AS catalog_name', 
                'd_catalog.category_name AS category_name',
                'd_catalog.category_code AS cat_id',
                'd_catalog.price AS real_price',
                'd_catalog.discount AS discount',
                // 't_order.catalog_id AS cats_id',
                't_order.status AS status',
                't_order.address AS address',
                't_order.phone AS phone',
                't_order.id AS orders_id',
                't_order.created_at AS created_ats',
                't_order.updated_at AS updated_ats',
                'users.name AS user_name',
                'users.email AS user_email',
                'users.phone AS user_phone')
        // ->select('*')
        // ->leftJoin('t_payment', 't_order.order_id', '=', 't_payment.id')
        ->leftJoin('d_catalog', 'd_catalog.id', '=', 't_order.category_id')
        ->leftJoin('m_catalog', 'm_catalog.id', '=', 'd_catalog.catalog_id')
        // ->leftJoin('m_bank', 'm_bank.id', '=', 't_payment.bank')
        ->leftJoin('users', 'users.id', '=', 't_order.user_id')
        // ->where('t_order.created_at', '>=', $request->start)
        ->whereBetween(DB::raw('DATE(t_order.created_at)'), [(string)$request->start, (string)$request->end])
        // ->whereDate('t_order.created_at','>=', "'$request->start'")
        // ->whereDate('t_order.created_at','<', "'$request->end'")
        ->get();

        $invoice = 'REP/DP/'.date('m').'/'.date('y');
        $data = [
            'orders' => $orders,
            'inv_id' => $invoice,
            'start' => $request->start,
            'end' => $request->end,
        ];
        $pdfContent = PDF::loadView('livewire/generateReport', $data);

        return $pdfContent->download('Report'.date('dmy').'.pdf');
    }
    public function render()
    {
        return view('livewire.report');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    use WithPagination;
    public function render(Request $request)
    {
        
        if (session('role') == 'admin') {

            $jumlah = [];
            $totalorder = [];
            $income = [];
            $cat1 = [];
            $cat2 = [];
            $cat3 = [];
            $getall = Order::leftJoin('users', 'users.id', '=', 't_order.user_id')
                    ->select('t_order.*','t_order.id as id_order','users.id','users.name','users.email','users.phone')
                    // ->whereDate('t_order.createdx_at','=',date('Y-m'))
                    ->where(DB::raw('YEAR(t_order.created_at)'),'=',date('Y'))
                    ->where(DB::raw('MONTH(t_order.created_at)'),'=',date('m'))
                    ->get();
            foreach ($getall as $key => $order) {
                $jumlah[] = $order->fix_price;
                $totalorder[] = $order->id_order;
                if ($order->status == 1) {
                    $income[] = $order->fix_price;
                }
            }
            $orders = count($totalorder);

            $datachart1 = Order::select(DB::raw('YEAR(created_at),MONTH(created_at) AS a,COUNT(id) AS TOTALCOUNT '))
                        ->where('catalog_id',1)
                        ->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
                        ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))->get();
            $datachart2 = Order::select(DB::raw('YEAR(created_at),MONTH(created_at) AS a,COUNT(id) AS TOTALCOUNT '))
                        ->where('catalog_id',2)
                        ->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
                        ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))->get();
            $datachart3 = Order::select(DB::raw('YEAR(created_at),MONTH(created_at) AS a,COUNT(id) AS TOTALCOUNT '))
                        ->where('catalog_id',3)
                        ->where(DB::raw('YEAR(created_at)'),'=',date('Y'))
                        ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))->get();
            for ($i=0; $i < 12; $i++) { 
                foreach ($datachart1 as $order) {
                    if ($order->a == $i+1) {
                        $cat1[$i] = $order->TOTALCOUNT;
                    }else{
                        $cat1[$i] = 0;
                    }
                    
                }
                foreach ($datachart2 as $order) {
                    if ($order->a == $i+1) {
                        $cat2[$i] = $order->TOTALCOUNT;
                    }else{
                        $cat2[$i] = 0;
                    }
                    
                }
                foreach ($datachart3 as $order) {
                    if ($order->a == $i+1) {
                        $cat3[$i] = $order->TOTALCOUNT;
                    }else{
                        $cat3[$i] = 0;
                    }
                    
                    
                }
            }
            // dd($cat1);

            return view('livewire.dashboard',[
                'activeorder' => Order::leftJoin('users', 'users.id', '=', 't_order.user_id')
                                ->select('t_order.*','t_order.id as id_order','users.id','users.name','users.email','users.phone')
                                // ->where('t_order.created_at','=',date('Y-m'))
                                ->where(DB::raw('YEAR(t_order.created_at)'),'=',date('Y'))
                                ->where(DB::raw('MONTH(t_order.created_at)'),'=',date('m'))
                                ->latest()->paginate(10),
                'getall' => $getall,
                'total_balance' => array_sum($jumlah),
                'income' => array_sum($income),
                'today_order' => $orders,
                'cat1' => $cat1,
                'cat2' => $cat2,
                'cat3' => $cat3
            ]);
        }else{
            auth()->logout();
            return view('livewire.auth.login');
        }
    }
}

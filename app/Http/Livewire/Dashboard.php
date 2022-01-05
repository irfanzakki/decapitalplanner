<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Dashboard extends Component
{
    use WithPagination;
    public function render(Request $request)
    {
        
        if (session('role') == 'admin') {
            return view('livewire.dashboard',[
                'activeorder' => Order::leftJoin('users', 'users.id', '=', 't_order.user_id')
                                ->select('t_order.*','t_order.id as id_order','users.id','users.name','users.email','users.phone')
                                ->where('t_order.created_at','<',date('Y-m-d'))->latest()->paginate(10),
            ]);
        }else{
            auth()->logout();
            return view('livewire.auth.login');
        }
    }
}

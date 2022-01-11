<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Rtl extends Component
{
    use WithPagination;
    public function paymentApprove($id){
        $edit = Payment::find($id);
        $order = Order::find($edit->order_id);
        
        if ($edit) {
            
            $edit->update([
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $order->update([
                'status' => 2,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            session()->flash('message', 'Payment successfully approved.');
            return redirect()->route('rtl');
        }
    }
    public function paymentDecline($id){
        $edit = Payment::find($id);
        $order = Order::find($edit->order_id);
        if ($edit) {
            
            $edit->update([
                'remarks' => 'Data Has been Canceled by Admin',
                'status' => 2,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $order->update([
                'remarks' => 'Data Has been Canceled by Admin',
                'status' => 3,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            session()->flash('message', 'Payment successfully declined.');
            return redirect()->route('rtl');
        }
    }
    public function render(Request $request)
    {
        return view('livewire.rtl',[
            'payments' => Payment::leftJoin('t_order', 't_payment.order_id', '=', 't_order.id')
            ->leftJoin('d_catalog', 'd_catalog.id', '=', 't_order.catalog_id')
            ->leftJoin('m_catalog', 'm_catalog.id', '=', 'd_catalog.catalog_id')
            ->leftJoin('m_bank', 'm_bank.id', '=', 't_payment.bank')
            ->select('t_payment.*','t_order.fix_price as price','t_order.order_id as order_id', 'm_catalog.catalog_name AS catalog_name', 
                    'd_catalog.category_name AS category_name',
                    'd_catalog.category_code AS cat_id',
                    'm_bank.bank_name')
            ->latest()->paginate(10),
        ]);
    }
}

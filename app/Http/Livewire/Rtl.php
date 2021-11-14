<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Rtl extends Component
{
    use WithPagination;
    public function render(Request $request)
    {
        return view('livewire.rtl',[
            'payments' => Payment::leftJoin('t_order', 't_payment.order_id', '=', 't_order.id')
            ->leftJoin('m_catalog', 'm_catalog.id', '=', 't_order.catalog_id')
            ->leftJoin('d_catalog', 'm_catalog.id', '=', 'd_catalog.catalog_id')
            ->leftJoin('m_bank', 'm_bank.id', '=', 't_payment.bank')
            ->select('t_payment.*','t_order.fix_price as price','t_order.order_id as order_id', 'm_catalog.catalog_name AS catalog_name', 
                    'd_catalog.category_name AS category_name',
                    'd_catalog.category_code AS cat_id',
                    'm_bank.bank_name')
            ->latest()->paginate(10),
        ]);
    }
}

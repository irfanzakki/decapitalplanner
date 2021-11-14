<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Billing extends Component
{
    use WithPagination;
    public function render(Request $request)
    {
        return view('livewire.order',[
            'orders' => Order::leftJoin('m_catalog', 'm_catalog.id', '=', 't_order.catalog_id')
            ->leftJoin('d_catalog', 'm_catalog.id', '=', 'd_catalog.catalog_id')
            ->select('t_order.*', 'm_catalog.catalog_name AS catalog_name', 
                    'd_catalog.category_name AS category_name',
                    'd_catalog.category_code AS cat_id')->latest()->paginate(10),
        ]);
    }
}

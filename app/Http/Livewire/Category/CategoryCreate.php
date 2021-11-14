<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryCreate extends Component
{
    public $catalog_name;
    public $created_date;
    public $showSuccesNotification  = false;
    
    protected $rules = [
        'catalog_name' => 'required|max:40|min:3',
        'created_date' => '',
    ];

    // public function mount() { 
    //     $this->category = new Category();
    // }

    public function save() {

            $this->validate([
                'catalog_name' => 'required|max:40|min:3'
            ]);
            // $this->category->save();
            Category::create([
                'catalog_name' => $this->catalog_name,
                'created_date' => date('Y-m-d H:i:s')
            ]);
            $this->showSuccesNotification = true;

            session()->flash('message', 'Category successfully added.');
            $this->reset();
        
    }

    public function render()
    {
        return view('livewire.category.category-create');
    }
}

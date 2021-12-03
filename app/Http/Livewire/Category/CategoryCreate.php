<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CategoryCreate extends Component
{
    use WithFileUploads;

    public $category_name;
    public $catalog_id;
    public $category_code;
    public $price;
    public $discount;
    public $filename;
    public $description;
    public $created_date;
    public $showSuccesNotification  = false;
    
    protected $rules = [
        'category_name' => 'required|max:40|min:3',
        'catalog_id' => 'required',
        'discount' => 'required',
        'created_date' => '',
    ];

    // public function mount() { 
    //     $this->category = new Category();
    // }

    public function save() {

            $this->validate([
                'category_name' => 'required|max:40|min:3',
                'catalog_id' => 'required',
                'category_code' => 'required',
                'price' => 'required',
                'discount' => 'required',
                'filename' => 'required|image|max:2048',
                'description' => 'required',
            ]);
            // $this->category->save();
            Category::create([
                'category_name' => $this->category_name,
                'catalog_id' => $this->catalog_id,
                'category_code' => $this->category_code,
                'price' => $this->price,
                'filename' => $this->filename,
                'discount' => $this->discount,
                'description' => $this->description,
                'created_date' => date('Y-m-d H:i:s')
            ]);
            $this->filename->store('assets_frontend/img');
            $this->showSuccesNotification = true;

            session()->flash('message', 'Category successfully added.');
            $this->reset();
        
    }

    public function render()
    {
        return view('livewire.category.category-create');
    }
}

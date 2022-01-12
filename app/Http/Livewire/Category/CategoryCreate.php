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
    public $category_type;
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

    public function save() {

            $this->validate([
                'category_name' => 'required|max:40|min:3',
                'catalog_id' => 'required',
                'category_code' => 'required',
                'category_type' => 'required',
                'price' => 'required',
                'discount' => 'required',
                'filename' => 'required|image|max:2048',
                'description' => 'required',
            ]);
            // $this->category->save();
            $filenames = $this->filename->getClientOriginalName();
            Category::create([
                'category_name' => $this->category_name,
                'catalog_id' => $this->catalog_id,
                'category_code' => $this->category_code,
                'category_type' => $this->category_type,
                'price' => $this->price,
                'filename' => $filenames,
                'discount' => $this->discount,
                'description' => $this->description,
                'created_date' => date('Y-m-d H:i:s')
            ]);
            $this->filename->storeAs('public/new_assets_frontend',$filenames);
            $this->showSuccesNotification = true;

            session()->flash('message', 'Category successfully added.');
            $this->reset();
    }

    public function render()
    {
        return view('livewire.category.category-create');
    }
}

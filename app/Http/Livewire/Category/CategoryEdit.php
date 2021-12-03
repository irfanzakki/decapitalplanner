<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CategoryEdit extends Component
{   
    use WithFileUploads;
    public $postId;
    public $category_name;
    public $category_code;
    public $catalog_id;
    public $price;
    public $discount;
    public $description;
    public $filename;

    public function mount($id){
        $edit = Category::find($id);
        // dd($edit);
        if ($edit) {
            $this->postId = $edit->id;
            $this->category_name = $edit->category_name;
            $this->category_code = $edit->category_code;
            $this->catalog_id = $edit->catalog_id;
            $this->description = $edit->description;
            $this->discount = $edit->discount;
            $this->price = $edit->price;
            $this->filename = $edit->filename;
        }
    }

    public function update(){
        $edit = Category::find($this->postId);
        if ($edit) {
            $filenames = $this->filename->getClientOriginalName();
            $edit->update([
                'category_name' => $this->category_name,
                'category_code' => $this->category_code,
                'catalog_id' => $this->catalog_id,
                'description' => $this->description,
                'discount' => $this->discount,
                'price' => $this->price,
                'filename' => $filenames,
                'updated_date' => date('Y-m-d H:i:s')
            ]);
            $this->filename->store('assets_frontend');
            session()->flash('message', 'Category successfully updated.');
            return redirect()->route('tables');
        }
    }
    
    public function render()
    {
        return view('livewire.category.category-edit');
    }
}

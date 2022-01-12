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
    public $category_type;
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
            $this->category_type = $edit->category_type;
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
            // dd($this->filename);
            if ($this->filename != $edit->filename) {
                $filenames = $this->filename->getClientOriginalName();
                $this->filename->storeAs('public/new_assets_frontend',$filenames);
            }else{
                $filenames = $edit->filename;
            }
            
            $edit->update([
                'category_name' => $this->category_name,
                'category_code' => $this->category_code,
                'category_type' => $this->category_type,
                'catalog_id' => $this->catalog_id,
                'description' => $this->description,
                'discount' => $this->discount,
                'price' => $this->price,
                'filename' => $filenames,
                'updated_date' => date('Y-m-d H:i:s')
            ]);
            
            session()->flash('message', 'Category successfully updated.');
            return redirect()->route('tables');
        }
    }
    
    public function render()
    {
        return view('livewire.category.category-edit');
    }
}

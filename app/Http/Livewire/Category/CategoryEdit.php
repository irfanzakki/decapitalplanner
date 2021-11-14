<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryEdit extends Component
{   
    public $postId;
    public $catalog_name;

    public function mount($id){
        $edit = Category::find($id);
        if ($edit) {
            $this->postId = $edit->id;
            $this->catalog_name = $edit->catalog_name;
        }
    }

    public function update(){
        $edit = Category::find($this->postId);
        if ($edit) {
            $edit->update([
                'catalog_name' => $this->catalog_name,
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

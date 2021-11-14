<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Tables extends Component
{
    use WithPagination;
    public $showSuccesNotification  = false;

    protected $paginationTheme = 'bootstrap';

    public function destroy($id){
        $edit = Category::find($id);
        if ($edit) {
            $edit->delete();

            session()->flash('message', 'Category successfully deleted.');
            return redirect()->route('tables');
        }
    }

    public function render(Request $request)
    {   
        return view('livewire.tables',[
            'catalogs' => Category::latest()->paginate(10),
        ]);
    }
}

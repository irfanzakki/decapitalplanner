<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gallery;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
class StaticSignIn extends Component
{
    use WithFileUploads;

    public $description;
    public $filenames;
    public $showSuccesNotification  = false;

    // protected $rules = [
    //     'filename' => 'required',
    //     'description' => 'required',
    // ];

    public function save() {
            $this->validate([
                'filenames' => 'required|max:2048|file|image|mimes:jpeg,png,jpg',
                'description' => 'required',
            ]);
            
            // $filenames = $this->filename->getClientOriginalName();
            $file = $this->filenames->getClientOriginalName();
                
            $this->filenames->store('assets_frontend/gallery',encrypt($file));
            
            Gallery::create([
                
                'filename' => $file,
                'description' => $this->description,
                'created_date' => date('Y-m-d H:i:s'),
                'updated_date' => date('Y-m-d H:i:s'),
            ]);

            
        
                // isi dengan nama folder tempat kemana file diupload
            
            
            $this->showSuccesNotification = true;
            $this->reset();
            session()->flash('message', 'Category successfully added.');
             return redirect()->route('gallery');
    }

    public function render()
    {   
        return view('livewire.static-sign-in',[
            'gallery' => Gallery::select('*')->get(),
        ]);
    }
}

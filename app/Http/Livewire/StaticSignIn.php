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


    public function save() {
            $this->validate([
                'filenames' => 'required|max:2048|file|image|mimes:jpeg,png,jpg',
                'description' => 'required',
            ]);
            
            // $filenames = $this->filename->getClientOriginalName();
            $file = $this->filenames->getClientOriginalName();
            $this->filenames->storeAs('public/assets_frontend/gallery',$file);
            
            Gallery::create([
                
                'filename' => $file,
                'description' => $this->description,
                'created_date' => date('Y-m-d H:i:s'),
                'updated_date' => date('Y-m-d H:i:s'),
            ]);

            
        
                // isi dengan nama folder tempat kemana file diupload
            
            
            $this->showSuccesNotification = true;
            $this->reset();
            session()->flash('message', 'Photo successfully added.');
             return redirect()->route('galleries');
    }

    public function deleteImage($id){
        $delete = Gallery::find($id);
        if ($delete) {
            $delete->delete();
            $this->showSuccesNotification = true;
            session()->flash('message', 'Photo successfully deleted.');
            return redirect()->route('galleries');
        }
    
    }

    public function render()
    {   
        return view('livewire.static-sign-in',[
            'gallery' => Gallery::select('*')->get(),
        ]);
    }
}

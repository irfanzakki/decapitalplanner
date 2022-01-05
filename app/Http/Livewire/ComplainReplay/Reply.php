<?php

namespace App\Http\Livewire\ComplainReplay;

use App\Models\Complain;
use Livewire\Component;
use App\Http\Controllers\Mails;
use Illuminate\Http\Request;
use Mail;


class Reply extends Component
{   
    public $email;
    public $title;
    public $description;

    public function sendEmail(Request $request){
        $datas = $request->input();
        $data = [
            "to" =>$this->email,
            "subject" => $this->title,
            'content' => $this->description
        ];
        Mail::to($this->email)->cc([])->bcc([])->send(new Mails($data));
        return redirect()->route('complains');
    }

    
    public function deleteTicket($id){
        $delete = Complain::find($id);
        if ($delete) {
            $delete->delete();

            session()->flash('message', 'Complain successfully deleted.');
            return redirect()->route('complains');
        }
    }

    public function render()
    {
        return view('livewire.complains.reply');
        
    }

}
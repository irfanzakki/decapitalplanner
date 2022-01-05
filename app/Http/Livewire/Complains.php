<?php

namespace App\Http\Livewire;

use App\Models\Complain;
use Livewire\Component;
use App\Mail\Mails;
use Illuminate\Http\Request;
use Mail;

class Complains extends Component
{
    public function render()
    {
        return view('livewire.complain',[
            'orders' => Complain::leftJoin('users', 'users.id', '=', 't_complain.user_id')
            ->select('t_complain.*','t_complain.id as complain_id','users.id','users.name','users.email','users.phone')
            ->latest()->paginate(10)]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Mails extends Mailable
{
    use Queueable, SerializesModels;
    protected $email_data;

    public function __construct($data)
    {
        $this->email_data = $data;
    }

    public function build()
    {
        // dd($this->email_data);
        return $this->from('irfanzakki2312@gmail.com', "Decapital Planner")
                ->subject($this->email_data['subject'])
                ->view('mail')
                ->with([
                    'to' => $this->email_data['to'],
                    'subject' => $this->email_data['subject'],
                    'description' => $this->email_data['content'],
                ]);
    }
}
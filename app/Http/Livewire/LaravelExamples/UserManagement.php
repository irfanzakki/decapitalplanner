<?php

namespace App\Http\Livewire\LaravelExamples;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class UserManagement extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.laravel-examples.user-management',[
            'users' => User::select('*')->latest()->paginate(10),
        ]);
    }
}

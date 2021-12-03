<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;
    public $userId;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $about;
    public $location;
    public $password;
    public $role;
    public $showSuccesNotification  = false;

    public $showDemoNotification = false;
    
    protected $rules = [
        'firstname' => 'required|max:40|min:3',
        'lastname' => 'required|max:40|min:3',
        'role' => 'required',
        'email' => 'required|email:rfc,dns',
        'phone' => 'required|max:15',
        'about' => 'max:200',
        'location' => 'min:3'
    ];

    

    public function mount($id = null){
        $edit = User::find($id);
        // dd($edit);
        if ($edit) {
            $this->userId = $edit->id;
            $this->firstname = $edit->firstname;
            $this->lastname = $edit->lastname;
            $this->email = $edit->email;
            $this->phone = $edit->phone;
            $this->about = $edit->about;
            $this->role = $edit->role;
            $this->location = $edit->location;
        }
    }

    public function save() {

        $edit = User::find($this->userId);
        if ($edit) {
            $this->validate();
            $edit->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'name' => $this->firstname.' '.$this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
                'about' => $this->about,
                'role' => $this->role,
                'location' => $this->location,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $this->showSuccesNotification = true;
            session()->flash('message', 'Category successfully updated.');
            return redirect()->route('user-profile');
        }else{
            $this->rules = [
                'password' => 'required|max:40|min:3',
                'firstname' => 'max:40|min:3',
                'lastname' => 'max:40|min:3',
                'email' => 'email:rfc,dns',
                'phone' => 'required|max:15',
                'role' => 'required',
                'about' => 'max:200',
                'location' => 'min:3'
            ];
            $this->validate();
            User::create([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'name' => $this->firstname.' '.$this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
                'about' => $this->about,
                'role' => $this->role,
                'location' => $this->location,
                'password' => Hash::make($this->password),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $this->showSuccesNotification = true;
            session()->flash('message', 'Category successfully updated.');
            return redirect()->route('user-profile');
        }
        
    }

    public function render()
    {
        return view('livewire.laravel-examples.user-profile');
    }
}

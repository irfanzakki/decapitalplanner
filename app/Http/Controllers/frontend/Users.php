<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    public function signin()
    {
        return view('frontend.signin');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function storeUser(Request $request)
    {	
        $rules = [
			'firstname' => 'required|string|min:3|max:255',
			'lastname' => 'required|string|min:3|max:255',
			'email' => 'required|string|email|max:255|unique:email',
			'phone' => 'required|string|max:15|unique:phone',
			'password' => 'required|string|max:20',
		];
		
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
            
			return redirect('register')
			->withInput()
			->withErrors($validator);
		}
		else{
			
            $data = $request->input();
			
			try{

				UserModel::create([
					'users.firstname' => $data['firstname'],
					'users.lastname' => $data['lastname'],
					'users.email' => $data['email'],
					'users.phone' => $data['phone'],
					'users.role' => 'member',
					'users.password' => Hash::make($request->password),
				]);
                
				// $member->save();
				return redirect('signin')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('register')->with('failed',"operation failed");
			}
		}
    }
}

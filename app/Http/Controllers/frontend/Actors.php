<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Actors extends Controller
{
    public function signin()
    {
        return view('frontend.signin');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function do_login(Request $request){
        if ($request->isMethod('post')) {
            $rules = array(
                'email' => 'required|email', // make sure the email is an actual email
                'password' => 'required'
            );

            // dd(Session::get('last_checkout'));
            // password has to be greater than 3 characters and can only be alphanumeric and);
            // checking all field
            $data = $request->input();
            $validator = Validator::make($request->all(),$rules);
            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return redirect('signin')->with('status',"Login Failed"); // send back all errors to the login form
                // dd($validator);
            }else{
                // create our user data for the authentication
                $userdata = array(
                    'email' => $data['email'],
                    'password' => $data['password']
                );
                // attempt to do the login
                if (Auth::attempt($userdata)) {
                    // validation successful
                    // do whatever you want on success
                    $users = DB::table('users')
                    ->select('*')
                    ->where('email', '=', $userdata['email'])
                    ->get();
                    session([
                        'is_login' => 'true',
                        "user_id" => $users[0]->id,
                        "firstname" => $users[0]->firstname,
                        "lastname" => $users[0]->lastname,
                        "email" => $users[0]->email,
                        "phone" => $users[0]->phone,
                    ]);
                    return redirect(Session::get('last_checkout'))->with('status',"Login successfully");
                }else{
                    // validation not successful, send back to form
                    return redirect('signin')->with('status',"Login Failed");
                }
            }
        }
    }

    public function storeUser(Request $request)
    {	
        
        if ($request->isMethod('post')) {
            $rules = [
                'firstname' => 'required|string|min:3|max:255',
                'lastname' => 'required|string|min:3|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|max:15',
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
                DB::table('users')->insert([
                    'name' => $data['firstname'].' '.$data['lastname'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'role' => 'member',
                    'password' => Hash::make($request->password),
                ]);
                
                // $member->save();
                return redirect('signin')->with('status',"Insert successfully");
                // try{
    
                    
                // }
                // catch(Exception $e){
                // 	return redirect('register')->with('failed',"operation failed");
                // }
            }
        }else{
            dd($request->method());
        }
        
    }

    public function logout(Request $request) {
        Session::flush();
        Auth::logout();
        return redirect('/');
      }
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Complain extends Controller
{
    public function index()
    {   
        
        $users = DB::table('d_catalog')
            ->select('*')
            ->where('id', '=', session('user_id'))
            ->get();
        return view('frontend.complain',['order' => $users]);
    }

    public function storeComplain(Request $request)
    {	
        if ($request->isMethod('post')) {
            $random = strtoupper(Str::random(7));
            
            $rules = [
                'order_id' => 'required|string|max:255',
                'firstname' => 'required|string|min:3|max:255',
                'lastname' => 'required|string|min:3|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|numeric',
                'description' => 'required|string|max:255',
                
            ];
            
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                dd($validator);
                return redirect('register')
                ->withInput()
                ->withErrors($validator);
            }
            else{
                $data = $request->input();
                $generate = 'CPL'.session('user_id').date('ymd').$random;
                DB::table('t_complain')->insert([
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'description' => $data['description'],
                    'order_id' => $data['order_id'],
                    'ticket' => $generate,
                    'user_id' => session('user_id'),
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                return redirect('/')->with('status',"Insert successfully");
            }
        }else{
            dd($request->method());
        }
        
    }
}

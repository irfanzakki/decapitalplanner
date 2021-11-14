<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Events extends Controller
{
    public function index($id)
    {   
        
        $users = DB::table('d_catalog')
            ->select('*')
            ->where('catalog_id', '=', $id)
            ->get();

        // dd($users);
        

        return view('frontend.event',['catalog' => $users]);
    }

    public function detail($id)
    {   
        
        $users = DB::table('d_catalog')
            ->select('*')
            ->where('id', '=', $id)
            ->get();

        // dd($users);
        

        return view('frontend.eventdetails',['catalog' => $users]);
    }

    public function checkout(Request $request,$id)
    {   
        if ($request->session()->exists('is_login')) {
            $users = DB::table('d_catalog')
            ->select('*')
            ->where('id', '=', $id)
            ->get();

            return view('frontend.checkout',['order' => $users]);
        }else{
            session(['last_checkout' => url()->current()]);
            return redirect('/signin');
        }
        
        
    }
}

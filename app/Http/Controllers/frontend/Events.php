<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Query\Builder;

class Events extends Controller
{
    
    // public function __construct(){
    //     session(['category_id' => url()->current(2)]);
    // }
    public $filter ;
    public $saveData;
    public function index(Request $request,$id)
    {   
        // dd($request->query());
        $this->filter = $id;
        
        $users = DB::table('d_catalog')
            ->select('d_catalog.*','category_type.type')
            ->leftJoin('category_type', 'category_type.id', '=', 'd_catalog.category_type')
            ->where('d_catalog.catalog_id', '=', $id)
            ->where( function($query) use($request){
                return $request->type ?
                       $query->from('d_catalog')->where('d_catalog.category_type',$request->type) : '';
            })->where( function($query) use($request,$id){
                return $request->category_id ?
                       $query->from('d_catalog')->where('d_catalog.catalog_id',$request->category_id) : $query->from('d_catalog')->where('d_catalog.catalog_id', $id);
            })->get();

        return view('frontend.event',['catalog' => $users]);
    }

    public function detail($id)
    {   
        
            // 
        $users = DB::table('d_catalog')
            ->select('d_catalog.*','category_type.type')
            ->leftJoin('category_type', 'category_type.id', '=', 'd_catalog.category_type')
            ->where('d_catalog.id', '=', $id)
            ->get();        

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

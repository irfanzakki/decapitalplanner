<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Gallery extends Controller
{
    public function index()
    {
        $image = DB::table('m_gallery')
            ->select('*')
            ->get();

        return view('frontend.gallery',['gallery' => $image]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
        ->only(['contact']);
    }


    public function home()
    {
//        dd(Auth::check());
//        dd(Auth::user());
//        dd(Auth::id());
        return view('home.index');
    }

    public function contact()
    {
        return view('home.contact');
    }
}

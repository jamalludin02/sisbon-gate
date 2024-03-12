<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->role == 'admin'){
            return redirect()->route('admin');
        }
        if(auth()->user()->role == 'SPV'){
            return redirect()->route('SPV');
        }
        return view('home');
    }
}

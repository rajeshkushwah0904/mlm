<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('frontend.home');
    }

        public function loginpage()
    {
        return view('frontend.loginpage');
    }

        public function registerpage()
    {
        return view('frontend.registerpage');
    }
     
        public function dashboard()
    {
        return view('backend.dashboard');
    }
}
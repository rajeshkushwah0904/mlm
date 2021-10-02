<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Auth;
use Session; 
use Validator;
use Illuminate\Support\Facades\Hash;
use Cookie;

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
        return view('home');
    }

        public function loginpage()
    {
        return view('frontend.loginpage');
    }

        public function registerpage()
    {
        return view('frontend.registerpage');
    }


    public function about()
    {
        $title = "About Us";
       $page_content = "We follow the path that leads us to grow together";
        return view('layouts.about', compact('title', 'page_content'));
    }

     public function founder_message()
    {
        $title = "Founder Message";
       $page_content = "We power to you with zero investment";
        return view('layouts.founder_message', compact('title', 'page_content'));
    }
    

      public function package()
    {
        $title = "Package";
       $page_content = "Subscribe to a marketing plan, which decides your passive income";
        return view('layouts.package', compact('title', 'page_content'));
    }

       public function contact()
    {
        $title = "Contact Us";
       $page_content = "Let's talk to us, we are more than happy to help you";
        return view('layouts.contact', compact('title', 'page_content'));
    }

        public function faq()
    {
        $title = "FAQ";
       $page_content = "Do you have any doubt? find your answer here";
        return view('layouts.faq', compact('title', 'page_content'));
    }

        public function terms_and_condition()
    {
        $title = "Terms & Conditions";
       $page_content = "Without any hassle, get the freedom to use our services";
        return view('layouts.terms_and_condition', compact('title', 'page_content'));
    }

        public function gallery()
    {
         $title = "Gallery";
       $page_content = "Want to write your success stories? Let's check who has written it?";
        return view('layouts.gallery',compact('title','page_content'));
    }

        public function banking()
    {
         $title = "Banking";
       $page_content = "Manage your financial details.";
        return view('layouts/banking',compact('title','page_content'));
    }

         public function product()
    {
        return view('layouts.product');
    }

          public function product_details()
    {
        return view('layouts.product_details');
    }
}
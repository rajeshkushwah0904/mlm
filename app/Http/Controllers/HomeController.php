<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Cookie;
use Razorpay\Api\Api;
use Session;
use Redirect;

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
       $packages = \App\Package::all();
        return view('layouts.package', compact('title', 'page_content','packages'));
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


    
         public function allproducts()
    {
        
        $products=\App\Product::paginate(10);
        $title = "Product Detail";
       $page_content = "Manage your financial details.";
        return view('layouts.allproducts',compact('title','page_content','products'));
    }

             public function category($id)
    {
        
        $products=\App\Product::where('category_id',$id)->paginate(10);
        $title = "Product Detail";
       $page_content = "Manage your financial details.";
        return view('layouts.allproducts',compact('title','page_content','products'));
    }


             public function subcategory($id)
    {
        
        $products=\App\Product::where('subcategory_id',$id)->paginate(10);
        $title = "Product Detail";
       $page_content = "Manage your financial details.";
        return view('layouts.allproducts',compact('title','page_content','products'));
    }


          public function product_detail($id)
    {
        $product=\App\Product::find($id);
        $title = "Product Detail";
       $page_content = "Manage your financial details.";
        return view('layouts.product_detail',compact('title','page_content','product'));
    }

    
          public function cart()
    {
        if(\Auth::user()){
          
        $add_to_carts=\App\Addtocart::where('distributor_id',\Auth::user()->id)->get();
        $title = "Cart";
       $page_content = "Your Shopping Cart";
        return view('layouts.cart',compact('title','page_content','add_to_carts'));  
        }else{
    return redirect()->back();
        }
    }

            public function checkout()
    {
        if(\Auth::user()){
          
        $add_to_carts=\App\Addtocart::where('distributor_id',\Auth::user()->id)->get();
        $distributor = \App\Distributor::find(\Auth::user()->distributor_id);
        $title = "Proceed To Checkout";
       $page_content = "Manage your financial details.";
        return view('layouts.checkout',compact('title','page_content','add_to_carts','distributor'));  
        }else{
    return redirect()->back();
        }
    }

        public function checkout_store(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }


        $distributor=\App\Distributor::find(\Auth::user()-> distributor_id);
        $order= \App\Order::create([
            'distributor_id'=>\Auth::user()-> distributor_id,
            'distributor_name'=>\Auth::user()->distributor_tracking_id,
            'email'=>\Auth::user()->email,
            'mobile'=>\Auth::user()->mobile,
            'gender',
            'address'=>$distributor->address,
            'pincode'=>$distributor->pincode, 
        ]);
        $total_taxable_amount =0;
        $total_gst_amount = 0;
        $delivery_amount= 50;
        $total_discount = 0;
        $total_amount = 0;
         $add_to_carts=\App\Addtocart::where('distributor_id',\Auth::user()->id)->get();
        foreach($add_to_carts as $add_to_cart){
            $product_price= \App\ProductPrice::where('product_id',$add_to_cart->product->id)->first();
             $order_product= \App\OrderProduct::create([
           'order_id'=>$order->id,
            'product_name'=>$add_to_cart->product->name,
            'product_taxable_amount'=>$product_price->actual_price,
            'product_gst_amount'=>$product_price->actual_price*$product_price->gst/100,
            'product_amount'=>$product_price->bussiness_volume,
            'qty'=>$add_to_cart->qty,
        ]);   
        $total_taxable_amount = $total_taxable_amount +  $product_price->actual_price; 
        $total_gst_amount = $total_gst_amount +   $product_price->actual_price*$product_price->gst/100;
        $total_amount  = $total_amount  + $product_price->bussiness_volume;
    }

        $payment= \App\Payment::create([
            'amount'=>$response['amount'],
            'entity'=>$response['entity'],
            'currency'=>$response['currency'],
            'amount_refunded'=>$response['amount_refunded'],
            'distributor_id'=>\Auth::user()-> distributor_id, 
            'order_id'=>$order->id,
            'order_date'=>date('Y-m-d')
        ]);

        $order->total_taxable_amount=$total_taxable_amount;
        $order->total_gst_amount=$total_gst_amount;
        $order->delivery_amount=$delivery_amount;
        $order->total_discount=$total_discount;
        $order->total_amount=$total_amount;
        $order->save();
        $add_to_carts=\App\Addtocart::where('distributor_id',\Auth::user()->id)->delete();
        $package = \App\Package::find($distributor->package_id);
        $distributor_level = \App\DistributorLevel::where('L0',\Auth::user()->distributor_id)->first();
              if($distributor_level->L0){  
            $level0_income = $total_amount*$package->sponsor_income/100;
                $income = \App\Income::create([
                    'distributor_id'=>\Auth::user()->distributor_id,
                    'amount'=>$total_amount,
                    'income_type'=>2,
                    'status'=>1,
                    'level'=>'L0',
                    'level_percentage'=>$package->sponsor_income,
                    'sponsor_id'=>$distributor_level->L0,
                    'sponsor_amount'=>$level0_income,
               ]);
              }
              if($distributor_level->L1){
             $level1_income = $total_amount*5/100;
                $income = \App\Income::create([
                     'distributor_id'=>\Auth::user()->distributor_id,
                    'amount'=>$total_amount,
                    'income_type'=>2,
                    'status'=>1,
                    'level'=>'L1',
                    'level_percentage'=>5,
                    'sponsor_id'=>$distributor_level->L1,
                    'sponsor_amount'=>$level1_income,
               ]);
              }
              if($distributor_level->L2){
                 $level2_income = $total_amount*3/100;
                $income = \App\Income::create([
                     'distributor_id'=>\Auth::user()->distributor_id,
                    'amount'=>$total_amount,

                    'income_type'=>2,
                    'status'=>1,
                    'level'=>'L2',
                    'level_percentage'=>3,
                    'sponsor_id'=>$distributor_level->L2,
                    'sponsor_amount'=>$level2_income,
               ]);
              }
              if($distributor_level->L3){
              $level3_income = $total_amount*2/100;
                $income = \App\Income::create([
                     'distributor_id'=>\Auth::user()->distributor_id,
                    'amount'=>$total_amount,

                    'income_type'=>2,
                    'status'=>1,
                    'level'=>'L3',
                    'level_percentage'=>2,
                    'sponsor_id'=>$distributor_level->L3,
                    'sponsor_amount'=>$level3_income,
               ]);
              }
        \Session::put('success', 'Payment successful');
        return redirect()->back();
    }

    


}
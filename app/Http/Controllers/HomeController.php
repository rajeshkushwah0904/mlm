<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Redirect;
use Session;

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
        $popup_banner = \App\PopupBanner::orderBy('id','DESC')->first();
        return view('home',compact('popup_banner'));
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
        return view('layouts.package', compact('title', 'page_content', 'packages'));
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
        return view('layouts.gallery', compact('title', 'page_content'));
    }

    public function banking()
    {
        $title = "Banking";
        $page_content = "Manage your financial details.";
        $banks = \App\Bank::where('status', 4)->get();
        return view('layouts.banking', compact('title', 'page_content', 'banks'));
    }

    public function qr_code()
    {
        $title = "QRCode";
        $page_content = "Scan Code For Payment";
        return view('layouts.qr_code', compact('title', 'page_content'));
    }

    public function allproducts()
    {

        $products = \App\Product::paginate(10);
        $title = "Product Detail";
        $page_content = "Manage your financial details.";
        return view('layouts.allproducts', compact('title', 'page_content', 'products'));
    }

    public function category($id)
    {

        $products = \App\Product::where('category_id', $id)->paginate(10);
        $title = "Product Detail";
        $page_content = "Manage your financial details.";
        return view('layouts.allproducts', compact('title', 'page_content', 'products'));
    }

    public function subcategory($id)
    {

        $products = \App\Product::where('subcategory_id', $id)->paginate(10);
        $title = "Product Detail";
        $page_content = "Manage your financial details.";
        return view('layouts.allproducts', compact('title', 'page_content', 'products'));
    }

    public function product_detail($id)
    {
        $product = \App\Product::find($id);
        $title = "Product Detail";
        $page_content = "Manage your financial details.";
        $products = \App\Product::whereNotIn('id', [$product->id])->paginate(10);
        return view('layouts.product_detail', compact('title', 'page_content', 'product', 'products'));
    }

    public function cart()
    {
        if (\Auth::user()) {

            $add_to_carts = \App\Addtocart::where('distributor_id', \Auth::user()->id)->get();
            $title = "Cart";
            $page_content = "Your Shopping Cart";
            return view('layouts.cart', compact('title', 'page_content', 'add_to_carts'));
        } else {
            return redirect()->back();
        }
    }

    public function checkout()
    {
        if (\Auth::user()) {

            $add_to_carts = \App\Addtocart::where('distributor_id', \Auth::user()->id)->get();
            $distributor = \App\Distributor::find(\Auth::user()->distributor_id);
            $title = "Proceed To Checkout";
            $page_content = "Manage your financial details.";
            return view('layouts.checkout', compact('title', 'page_content', 'add_to_carts', 'distributor'));
        } else {
            return redirect()->back();
        }
    }

    public function checkout_store(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

            } catch (\Exception $e) {
                return $e->getMessage();
                \Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        $distributor = \App\Distributor::find(\Auth::user()->distributor_id);
        $order = \App\Order::create([
            'distributor_id' => \Auth::user()->distributor_id,
            'distributor_name' => \Auth::user()->distributor_tracking_id,
            'distributor_name' => $distributor->name,
            'email' => $distributor->email,
            'mobile' => $distributor->mobile,
            'gender' => $distributor->gender,
            'address' => $distributor->address,
            'pincode' => $distributor->pincode,

        ]);

        $total_taxable_amount = 0;
        $total_gst_amount = 0;
        $delivery_amount = 50;
        $total_discount = 0;
        $total_amount = 0;
        $add_to_carts = \App\Addtocart::where('distributor_id', \Auth::user()->id)->get();
        foreach ($add_to_carts as $add_to_cart) {
            $product_price = \App\ProductPrice::where('product_id', $add_to_cart->product->id)->first();
            $order_product = \App\OrderProduct::create([
                'order_id' => $order->id,
                'product_name' => $add_to_cart->product->name,
                'product_taxable_amount' => $product_price->actual_price,
                'total_product_taxable_amount' => $product_price->actual_price * $add_to_cart->qty,
                'product_gst_amount' => $product_price->actual_price * $product_price->gst / 100,
                'product_amount' => $product_price->bussiness_volume * $add_to_cart->qty,
                'qty' => $add_to_cart->qty,
            ]);
            $total_taxable_amount = $total_taxable_amount + $product_price->actual_price * $add_to_cart->qty;
            $total_gst_amount = $total_gst_amount + $product_price->actual_price * $add_to_cart->qty * $product_price->gst / 100;
            $total_amount = $total_amount + $product_price->bussiness_volume * $add_to_cart->qty;
        }

        $payment = \App\Payment::create([
            'amount' => $response['amount'] / 100,
            'entity' => $response['entity'],
            'currency' => $response['currency'],
            'amount_refunded' => $response['amount_refunded'],
            'distributor_id' => \Auth::user()->distributor_id,
            'order_id' => $order->id,
            'order_date' => date('Y-m-d'),
        ]);
        $order->invoice_no = date('Y/m') . "/FR/" . $order->id;
        $order->total_taxable_amount = $total_taxable_amount;
        $order->total_gst_amount = $total_gst_amount;
        $order->delivery_amount = $delivery_amount;
        $order->total_discount = $total_discount;
        $order->total_amount = $total_amount;
        $order->grand_total = $total_amount + $order->delivery_amount - $order->total_discount;
        $order->save();
        $add_to_carts = \App\Addtocart::where('distributor_id', \Auth::user()->id)->delete();
        $package = \App\Package::find($distributor->package_id);
        $distributor_level = \App\DistributorLevel::where('L0', \Auth::user()->distributor_id)->first();
        if ($distributor_level->L0) {
            $income = \App\Income::create([
                'distributor_id' => \Auth::user()->distributor_id,
                'amount' => $total_amount,
                'income_type' => 2,
                'status' => 1,
                'level' => 'L0',
                'sponsor_id' => $distributor_level->L0,
            ]);
            if ($package) {
                $level0_income = $total_amount * $package->sponsor_income / 100;
                $income->level_percentage = $package->sponsor_income;
                $income->sponsor_amount = $level0_income;
            } else {
                $income->level_percentage = 0;
                $income->sponsor_amount = 0;
            }
            $income->save();
        }
        if ($distributor_level->L1) {
            $level1_income = $total_amount * 5 / 100;
            $income = \App\Income::create([
                'distributor_id' => \Auth::user()->distributor_id,
                'amount' => $total_amount,
                'income_type' => 2,
                'status' => 1,
                'level' => 'L1',
                'level_percentage' => 5,
                'sponsor_id' => $distributor_level->L1,
                'sponsor_amount' => $level1_income,
            ]);
        }
        if ($distributor_level->L2) {
            $level2_income = $total_amount * 3 / 100;
            $income = \App\Income::create([
                'distributor_id' => \Auth::user()->distributor_id,
                'amount' => $total_amount,

                'income_type' => 2,
                'status' => 1,
                'level' => 'L2',
                'level_percentage' => 3,
                'sponsor_id' => $distributor_level->L2,
                'sponsor_amount' => $level2_income,
            ]);
        }
        if ($distributor_level->L3) {
            $level3_income = $total_amount * 2 / 100;
            $income = \App\Income::create([
                'distributor_id' => \Auth::user()->distributor_id,
                'amount' => $total_amount,

                'income_type' => 2,
                'status' => 1,
                'level' => 'L3',
                'level_percentage' => 2,
                'sponsor_id' => $distributor_level->L3,
                'sponsor_amount' => $level3_income,
            ]);
        }
        \Session::put('success', 'Payment successful');
        return redirect()->route('layouts.invoice', $order->id);
    }

    public function checkout_wallet(Request $request)
    {

        $input = $request->all();

        $distributor = \App\Distributor::find(\Auth::user()->distributor_id);
        $distributor->used_wallet_amount = $distributor->used_wallet_amount + $input['amount'];
        $distributor->remaining_wallet_amount = $distributor->remaining_wallet_amount - $input['amount'];
        $distributor->save();

        $order = \App\Order::create([
            'distributor_id' => \Auth::user()->distributor_id,
            'distributor_name' => \Auth::user()->distributor_tracking_id,
            'distributor_name' => $distributor->name,
            'email' => $distributor->email,
            'mobile' => $distributor->mobile,
            'gender' => $distributor->gender,
            'address' => $distributor->address,
            'pincode' => $distributor->pincode,
        ]);

        $total_taxable_amount = 0;
        $total_gst_amount = 0;
        $delivery_amount = 50;
        $total_discount = 0;
        $total_amount = 0;
        $add_to_carts = \App\Addtocart::where('distributor_id', \Auth::user()->id)->get();
        foreach ($add_to_carts as $add_to_cart) {
            $product_price = \App\ProductPrice::where('product_id', $add_to_cart->product->id)->first();
            $order_product = \App\OrderProduct::create([
                'order_id' => $order->id,
                'product_name' => $add_to_cart->product->name,
                'product_taxable_amount' => $product_price->actual_price,
                'total_product_taxable_amount' => $product_price->actual_price * $add_to_cart->qty,
                'product_gst_amount' => $product_price->actual_price * $product_price->gst / 100,
                'product_amount' => $product_price->bussiness_volume * $add_to_cart->qty,
                'qty' => $add_to_cart->qty,
            ]);
            $total_taxable_amount = $total_taxable_amount + $product_price->actual_price * $add_to_cart->qty;
            $total_gst_amount = $total_gst_amount + $product_price->actual_price * $add_to_cart->qty * $product_price->gst / 100;
            $total_amount = $total_amount + $product_price->bussiness_volume * $add_to_cart->qty;
        }

        $payment = \App\Payment::create([
            'amount' => $input['amount'],
            'entity' => $input['entity'],
            'currency' => $input['currency'],
            'amount_refunded' => $input['amount_refunded'],
            'distributor_id' => \Auth::user()->distributor_id,
            'order_id' => $order->id,
            'order_date' => date('Y-m-d'),
        ]);
        $order->invoice_no = date('Y/m') . "/FR/" . $order->id;
        $order->total_taxable_amount = $total_taxable_amount;
        $order->total_gst_amount = $total_gst_amount;
        $order->delivery_amount = $delivery_amount;
        $order->total_discount = $total_discount;
        $order->total_amount = $total_amount;
        $order->grand_total = $total_amount + $order->delivery_amount - $order->total_discount;
        $order->save();
        $add_to_carts = \App\Addtocart::where('distributor_id', \Auth::user()->id)->delete();
        $package = \App\Package::find($distributor->package_id);
        $distributor_level = \App\DistributorLevel::where('L0', \Auth::user()->distributor_id)->first();
        if ($distributor_level->L0) {
            $income = \App\Income::create([
                'distributor_id' => \Auth::user()->distributor_id,
                'amount' => $total_amount,
                'income_type' => 2,
                'status' => 1,
                'level' => 'L0',
                'sponsor_id' => $distributor_level->L0,
            ]);
            if ($package) {
                $level0_income = $total_amount * $package->sponsor_income / 100;
                $income->level_percentage = $package->sponsor_income;
                $income->sponsor_amount = $level0_income;
            } else {
                $income->level_percentage = 0;
                $income->sponsor_amount = 0;
            }
            $income->save();
        }
        if ($distributor_level->L1) {
            $level1_income = $total_amount * 5 / 100;
            $income = \App\Income::create([
                'distributor_id' => \Auth::user()->distributor_id,
                'amount' => $total_amount,
                'income_type' => 2,
                'status' => 1,
                'level' => 'L1',
                'level_percentage' => 5,
                'sponsor_id' => $distributor_level->L1,
                'sponsor_amount' => $level1_income,
            ]);
        }
        if ($distributor_level->L2) {
            $level2_income = $total_amount * 3 / 100;
            $income = \App\Income::create([
                'distributor_id' => \Auth::user()->distributor_id,
                'amount' => $total_amount,

                'income_type' => 2,
                'status' => 1,
                'level' => 'L2',
                'level_percentage' => 3,
                'sponsor_id' => $distributor_level->L2,
                'sponsor_amount' => $level2_income,
            ]);
        }
        if ($distributor_level->L3) {
            $level3_income = $total_amount * 2 / 100;
            $income = \App\Income::create([
                'distributor_id' => \Auth::user()->distributor_id,
                'amount' => $total_amount,

                'income_type' => 2,
                'status' => 1,
                'level' => 'L3',
                'level_percentage' => 2,
                'sponsor_id' => $distributor_level->L3,
                'sponsor_amount' => $level3_income,
            ]);
        }
        \Session::put('success', 'Payment successful');
        return redirect()->route('layouts.invoice', $order->id);
    }

    public function invoice($id)
    {
        $order = \App\Order::find($id);
        $title = "Invoice Detail";
        $page_content = "Last Order Invoice Detail";
        return view('layouts.invoice', compact('title', 'page_content', 'order'));
    }
    public function privacy_policy()
    {
        $title = "Privacy policy";
        $page_content = "We care your privacy, get the freedom to use our services";
        return view('layouts.privacy_policy', compact('title', 'page_content'));
    }

    public function refund_policy()
    {
        $title = "Cancellation/ Refund Policy";
        $page_content = "Hassle free refund/Cancellation services";
        return view('layouts.refund_policy', compact('title', 'page_content'));
    }
    public function shipping_policy()
    {
        $title = "Shipping Policy";
        $page_content = "Shipping services";
        return view('layouts.shipping_policy', compact('title', 'page_content'));
    }

        public function legal()
    {
        $title = "Company Legal detail";
        $page_content = "Company Legal detail";
        $legal_documents = \App\LegalDocument::all();
        return view('layouts.legal', compact('title', 'page_content','legal_documents'));
    }
}
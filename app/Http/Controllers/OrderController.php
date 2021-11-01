<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = \App\Order::where('distributor_id', \Auth::user()->distributor_id)->get();
        return view('backend.orders.index', compact('orders'));
    }

    public function view(Request $request)
    {
        if (\Auth::user()->role == 1) {
            $order = \App\Order::where('invoice_no', $request->invoice_no)->first();
        } else {
            $order = \App\Order::where('distributor_id', \Auth::user()->distributor_id)->where('invoice_no', $request->distributor_id)->first();
        }
        if ($order) {
            return view('backend.orders.view', compact('order'));
        } else {
            return redirect()->back();
        }
    }

    function print(Request $request) {
        if (\Auth::user()->role == 1) {
            $order = \App\Order::where('invoice_no', $request->invoice_no)->first();
        } else {
            $order = \App\Order::where('distributor_id', \Auth::user()->distributor_id)->where('invoice_no', $request->distributor_id)->first();
        }
        if ($order) {
            return view('backend.orders.print', compact('order'));
        } else {
            return redirect()->back();
        }
    }
}
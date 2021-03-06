<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class OrderController extends Controller
{

    public function export()
    {
        return Excel::download(new OrdersExport, 'invoice_list.xlsx');
    }

    public function index(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if ($start_date && $end_date) {
            if (\Auth::user()->role == 1) {
                $orders = \App\Order::whereBetween('created_at', [$request->start_date, $request->end_date])->get();
            } else {
                $orders = \App\Order::whereBetween('created_at', [$request->start_date, $request->end_date])->where('distributor_id', \Auth::user()->distributor_id)->get();
            }

        } else {
            if (\Auth::user()->role == 1) {
                $orders = \App\Order::all();
            } else {
                $orders = \App\Order::where('distributor_id', \Auth::user()->distributor_id)->get();
            }
        }

        return view('backend.orders.index', compact('orders', 'start_date', 'end_date'));
    }

    public function download_pdf(Request $request, $id)
    {
        $data['site_route'] = $request->getSchemeAndHttpHost();

        $data['order'] = \App\Order::find($id);
        $pdf = PDF::loadView('backend.orders.download', $data)->setOptions(['defaultFont' => 'sans-serif', 'enable_javascript' => true]);
        return $pdf->download('invoice.pdf');
    }

    public function view(Request $request)
    {
        if (\Auth::user()->role == 1) {
            $order = \App\Order::where('invoice_no', $request->invoice_no)->first();
        } else {
            $order = \App\Order::where('distributor_id', \Auth::user()->distributor_id)->where('invoice_no', $request->invoice_no)->first();
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
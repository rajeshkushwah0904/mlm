<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddtocartController extends Controller
{
            public function add_to_cart($id)
    {
        $product = \App\Product::find($id);
        
        $add_to_cart = \App\Addtocart::where('product_id',$id)->where('distributor_id',\Auth::user()->distributor_id)->first();
        if($add_to_cart){
              $add_to_cart->qty=$add_to_cart->qty + 1;
               $add_to_cart->save();
        }else{
    $add_to_cart = \App\Addtocart::create([
            'product_id'=>$product->id,
             'price'=>$product->product_price->distributor_price,
              'qty'=>1,
               'distributor_id'=>\Auth::user()->distributor_id,
        ]);
        }
        
         session()->flash('success', 'Product Add to Cart Successfully.');
        return redirect()->back();
    }


                public function remove_from_cart($id)
    {
             $add_to_cart = \App\Addtocart::find($id);
        if ($add_to_cart->count()) {
            $add_to_cart->delete();
            session()->flash('success', 'Selected Product Remove From Cart successfully.');
         return redirect()->back();
        }
        session()->flash('error', 'Selected Product dose not found in database please try after some time.');
      return redirect()->back();
    }
}
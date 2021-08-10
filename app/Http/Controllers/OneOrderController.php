<?php

namespace App\Http\Controllers;
use App\Models\oneOrder;
use App\Models\Order;
use Illuminate\Support\Facades\auth;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OneOrderController extends Controller
{
    public function order(Request $request){
        $order = Order::create([
            'total_price' => $request->input('total_price'),
            'adresse' =>$request->input('adresse'),
            'user_id' => Auth::id(),
        ]);
        if($order){
            foreach(Cart::content() as $item){
               oneOrder::create([
                   'pourCombien' => $item->qty,
                   'plat_id' =>$item->id,
                   'cmd_id' => $order->id
               ]);
            }
            Cart::destroy();
        }
         return back()->with('success','your order saved successfully');
    }
}

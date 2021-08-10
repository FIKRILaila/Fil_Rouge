<?php

namespace App\Http\Controllers;
use App\Models\OneOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\auth;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OneOrderController extends Controller
{
    public function index(){
        $users = User::all(); 
        $orders = Order::orderBy('orders.created_at','DESC')->get();
        $rows = OneOrder::with(['orders','plats'])->orderBy('oneorder.created_at','DESC')->get();
        if(Auth::user()->role == 'chef'){
            return view('chef.OrdersToMe',['orders' => $orders,'rows' => $rows,'users'=>$users]);
        }
        if(Auth::user()->role == 'admin'){
            return view('admin.orders',['orders' => $orders,'rows' => $rows,'users'=>$users]);
        }
    }

    public function myOrders(){
        $orders = Order::where("user_id","=",Auth::id())->orderBy('orders.created_at','DESC')->get();
        $rows = OneOrder::with(['orders','plats'])->orderBy('oneorder.created_at')->get();
        return view('myOrders',['orders' => $orders,'rows' => $rows]);
    }

    public function order(Request $request){
        $order = Order::create([
            'total_price' => $request->input('total_price'),
            'adresse' =>$request->input('adresse'),
            'user_id' => Auth::id(),
            'validate' => false
        ]);
        if($order){
            foreach(Cart::content() as $item){
               OneOrder::create([
                   'pourCombien' => $item->qty,
                   'plat_id' =>$item->id,
                   'cmd_id' => $order->id
               ]);
            }
            Cart::destroy();
        }
         return back()->with('success','your order saved successfully');
    }
    public function valider(Request $request){
        $id = $request->input('cmd_id');
        $v = Order::where('id',"=", $id)->update([
            'validate' => true
        ]);
        if($v){
            return back()->with('success','validated successfully');
        }else{
            return back()->with('fail','Somthing went wrong');
        }
       
    }
    public function deleteCmd(Request $request){
        $id = $request->input('cmd_id');
        $delete = OneOrder::where('cmd_id',"=", $id)->delete();
        $d = Order::where('id',"=", $id)->delete();
        if($d && $delete){
            return back()->with('success','validated successfully');
        }else{
            return back()->with('fail','Somthing went wrong');
        }
    }
}

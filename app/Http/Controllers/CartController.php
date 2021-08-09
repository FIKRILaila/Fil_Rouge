<?php

namespace App\Http\Controllers;
use App\Models\Plat;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function store(request $request){
        $plat = Plat::findOrFail($request->input('plat_id'));
            Cart::add(
                           $plat->id,
                           $plat->name,
                           $request->input('qty'),
                           $plat->price,
                       );
        return redirect('/ChefsPosts/'.$plat->user->id)->with('success', 'Successfully added');
    }
    public function RemoveFromCart(Request $request){
        $id = $request->input('row_id');
        Cart::remove($id);
        return back()->with('success', 'Successfully removed');
    }
}

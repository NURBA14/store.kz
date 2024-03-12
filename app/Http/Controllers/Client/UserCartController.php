<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    public function index()
    {
        $carts = Auth::user()->carts()->with("product")->get();
        return view("client.cart.index", compact("carts"));
    }

    public function store(Request $request, $id)
    {
        $product = Product::find($id);
        $request->validate([
            "count" => "required|min:1|max:{$product->count}",
            "dev_location" => "required|max:255",
        ]);
        $product->count -= $request->count;
        $product->save();
        Cart::create([
            "user_id" => Auth::user()->id,
            "product_id" => $id,
            "count" => $request->count,
            "price" => $product->price * $request->count,
            "dev_location" => $request->dev_location,
        ]);
        session()->flash("success", "Your order saved");
        return redirect()->route("user.cart.index");
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        session()->flash("success", "Cart is deleted");
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $request->validate([
            "count" => "required|min:1|max:{$cart->product->count}",
            "dev_location" => "required|max:255",
        ]);
        $cart->update([
            "user_id" => Auth::user()->id,
            "product_id" => $cart->product_id,
            "price" => $cart->product->price * $request->count,
            "count" => $request->count,
            "dev_location" => $request->dev_location,
        ]);
        session()->flash("success", "Your order saved");
        return redirect()->route("user.cart.index");
    }
}

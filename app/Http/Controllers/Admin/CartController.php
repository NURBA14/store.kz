<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::with("product", "user")->where("approved", "=", 0)->orderBy("created_at", "DESC")->paginate(5);
        return view("admin.carts.index", compact("carts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);
        Order::create([
            "user_id" => $cart->user_id,
            "product_id" => $cart->product_id,
            "count" => $cart->count,
            "price" => $cart->price,
            "dev_location" => $cart->dev_location,
            "delivere_date" => date("Y-m-d H:i:s", time() + 3600 * 24 * 21),
            "token" => Str::random(16),
        ]);
        $cart->delete();
        session()->flash("success", "Order is approved");
        return redirect()->route("orders.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->product->count += $cart->count;
        $cart->product->save();
        $cart->delete();
        session()->flash("success", "Cart id deleted");
        return redirect()->back();
    }
}

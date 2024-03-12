<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function index()
    {
        $products = Product::where("active", "=", 1)->where("count", ">", 0)->orderBy("created_at", "DESC")->paginate(9);
        $products_count = $products->count();
        return view("client.search.index", compact("products", "products_count"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "s" => "required|max:255"
        ]);
        $products = Product::where("name", "LIKE", "%{$request->s}%")->where("active", "=", 1)->where("count", ">", 0)->orderBy("created_at", "DESC")->paginate();
        $products_count = $products->count();
        return view("client.search.index", compact("products", "products_count"));
    }
}

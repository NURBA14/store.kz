<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with("category")->where("active", "=", 1)->where("count", ">", "0")->orderBy("created_at", "DESC")->limit(6)->get();
        return view("client.home", compact("products"));
    }
}

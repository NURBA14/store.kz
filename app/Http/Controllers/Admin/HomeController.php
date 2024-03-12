<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::count();
        $views = Product::query()->sum("views");
        $orders = Order::query()->count();
        $carts = Cart::count();
        $products = Product::count();
        $categories = Category::count();
        return view("admin.home", compact("views", "users", "orders", "carts", "products", "categories"));
    }


    public function disactive()
    {
        $title = "Disactive products";
        $products = Product::with("category")->where("active", "=", 0)->orderBy("created_at", "DESC")->paginate(5);
        return view("admin.products.index", compact("products", "title"));
    }
}

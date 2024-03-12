<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientProductController extends Controller
{
    public function showProduct($id)
    {
        $product = Product::find($id);
        $product->views += 1;
        $product->save();
        return view("client.products.show", compact("product"));
    }
}

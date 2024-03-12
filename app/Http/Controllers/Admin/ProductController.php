<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Active products";
        $products = Product::with("category")->withCount("carts", "orders")->where("active", "=", 1)->orderBy("created_at", "DESC")->paginate(5);
        return view("admin.products.index", compact("products", "title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck("name", "id");
        return view("admin.products.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "old_price" => "nullable",
            "price" => "required|integer",
            "count" => "required|integer",
            "category_id" => "required|integer",
            "active" => "nullable",
            "img_1" => "required|image",
            "img_2" => "nullable|image",
            "img_3" => "nullable|image"
        ]);
        $folder = date("Y-m-d");
        $img_1 = $request->file("img_1")->store("image/{$folder}");
        if ($request->img_2) {
            $img_2 = $request->file("img_2")->store("image/{$folder}");
        } else {
            $img_2 = null;
        }
        if ($request->img_3) {
            $img_3 = $request->file("img_3")->store("image/{$folder}");
        } else {
            $img_3 = null;
        }
        if ($request->active) {
            $active = 1;
        } else {
            $active = 0;
        }
        Product::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "description" => $request->description,
            "old_price" => $request->old_price,
            "price" => $request->price,
            "count" => $request->count,
            "category_id" => $request->category_id,
            "active" => $active,
            "img_1" => $img_1,
            "img_2" => $img_2,
            "img_3" => $img_3
        ]);
        session()->flash("success", "Product is saved");
        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product->active == 1) {
            $product->update([
                "active" => 0
            ]);
            session()->flash("success", "{$product->name} is Not active");
        } elseif ($product->active == 0) {
            $product->update([
                "active" => 1
            ]);
            session()->flash("success", "{$product->name} is active");
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with("category")->find($id);
        $categories = Category::pluck("name", "id");
        return view("admin.products.edit", compact("product", "categories"));
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
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "old_price" => "nullable",
            "price" => "required|integer",
            "count" => "required|integer",
            "category_id" => "required|integer",
            "active" => "nullable",
            "img_1" => "nullable|image",
            "img_2" => "nullable|image",
            "img_3" => "nullable|image"
        ]);
        $product = Product::find($id);
        $folder = date("Y-m-d");
        if ($request->img_1) {
            Storage::delete($product->img_1);
            $img_1 = $request->file("img_1")->store("image/{$folder}");
        } else {
            $img_1 = $product->img_1;
        }
        if ($request->img_2) {
            Storage::delete($product->img_2);
            $img_2 = $request->file("img_2")->store("image/{$folder}");
        } else {
            $img_2 = $product->img_2;
        }
        if ($request->img_3) {
            Storage::delete($product->img_3);
            $img_3 = $request->file("img_3")->store("image/{$folder}");
        } else {
            $img_3 = $product->img_3;
        }
        if ($request->active) {
            $active = 1;
        } else {
            $active = 0;
        }
        $product->update([
            "name" => $request->name,
            "slug" => $product->slug,
            "description" => $request->description,
            "old_price" => $request->old_price,
            "price" => $request->price,
            "count" => $request->count,
            "category_id" => $request->category_id,
            "active" => $active,
            "img_1" => $img_1,
            "img_2" => $img_2,
            "img_3" => $img_3
        ]);
        session()->flash("success", "Product {$product->name} is saved");
        if ($active == 1) {
            return redirect()->route("products.index");
        }
        return redirect()->route("products.disactive");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->orders and $product->carts) {
            session()->flash("error", 'This product have Orders and Carts');
            return redirect()->route("products.index");
        }
        if ($product->img_1) {
            Storage::delete($product->img_1);
        }
        if ($product->img_2) {
            Storage::delete($product->img_2);
        }
        if ($product->img_3) {
            Storage::delete($product->img_3);
        }
        $product->delete();
        return redirect()->route("products.index");
    }
}

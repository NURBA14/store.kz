<?php

use App\Http\Controllers\Client\HomeController as ClientHome;

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\ClientProductController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\UserCartController;
use App\Http\Controllers\Client\UserOrderController;
use App\Http\Controllers\Client\UserSearchController;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\User\FargotPassController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegController;
use App\Http\Controllers\User\ResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [ClientHome::class, "index"])->name("home");
Route::get("/product/{id}/show", [ClientProductController::class, "showProduct"])->name("client.product.show");
Route::get("/search", [UserSearchController::class, "index"])->name("user.search.index");
Route::get("/search/list", [UserSearchController::class, "store"])->name("user.search.store");


Route::group(["middleware" => ["auth", "admin"], "prefix" => "admin"], function () {
    Route::get("/", [HomeController::class, "index"])->name("admin.home");
    Route::get("/disactive/products/", [HomeController::class, "disactive"])->name("products.disactive");
    Route::resource("/products", ProductController::class);
    Route::resource("/categories", CategoryController::class);
    Route::resource("/carts", CartController::class);
    Route::resource("/orders", OrderController::class);
});

Route::group(["middleware" => "auth"], function () {
    Route::get("/profile", [ProfileController::class, "index"])->name("profile.index");
    Route::post("/profile", [ProfileController::class, "store"])->name("profile.store");
    Route::get("/user/cart", [UserCartController::class, "index"])->name("user.cart.index");
    Route::post("/user/cart/{id}", [UserCartController::class, "store"])->name("user.cart.store");
    Route::get("/user/cart/{id}/delete", [UserCartController::class, "delete"])->name("user.cart.delete");
    Route::put("/user/cart/{id}/update", [UserCartController::class, "update"])->name("user.cart.update");
    Route::get("user/order/", [UserOrderController::class, "index"])->name("user.order.index");
    Route::post("/logout", [LoginController::class, "logout"])->name("logout");
});

Route::group(["middleware" => "guest"], function () {
    Route::get("/login", [LoginController::class, "index"])->name("login.index");
    Route::post("/login", [LoginController::class, "store"])->name("login.store");
    Route::get("/register", [RegController::class, "index"])->name("reg.index");
    Route::post("/register", [RegController::class, "store"])->name("reg.store");
    Route::get("/fargot/password", [FargotPassController::class, "index"])->name("fargot.index");
    Route::post("/fargot/password", [FargotPassController::class, "store"])->name("fargot.store");
    Route::get("/reset/password", [ResetPasswordController::class, "index"])->name("password.reset");
    Route::post("/reset/password", [ResetPasswordController::class, "store"])->name("password.store");
});
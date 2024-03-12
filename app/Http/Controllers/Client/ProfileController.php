<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view("client.user.profile");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "phone_number" => "nullable|integer",
            "avatar" => "nullable|image",
            "bank_cart" => "required|integer",
            "bank_cart_age" => "required|integer",
            "cvv" => "required|integer"
        ]);
        $user = User::find(Auth::user()->id);
        if ($request->has("avatar")) {
            $user->deleteAvatar();
            $folder = date("Y-m-d");
            $avatar = $request->file("avatar")->store("avatar/{$folder}");
        }
        $user->update([
            "name" => $request->name,
            "phone_number" => $request->phone_number ?? null,
            "avatar" => $avatar ?? $user->avatar,
            "bank_cart" => $request->bank_cart,
            "bank_cart_age" => $request->bank_cart_age,
            "cvv" => $request->cvv
        ]);
        session()->flash("success", "Data is saved");
        return redirect()->back();
    }
}

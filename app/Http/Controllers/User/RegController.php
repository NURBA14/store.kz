<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegController extends Controller
{
    public function index()
    {
        return view("user.register");
    }


    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email|unique:users",
            "name" => "required|max:255",
            "password" => "required|confirmed"
        ]);
        $user = User::create([
            "email" => $request->email,
            "name" => $request->name,
            "password" => Hash::make($request->password)
        ]);
        Auth::login($user);
        session()->flash("success", "Your are registered");
        return redirect()->route("home");
    }

    
}

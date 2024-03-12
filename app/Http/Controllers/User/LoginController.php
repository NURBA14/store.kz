<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("user.login");
    }


    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email|string",
            "password" => "required|string",
            "remember_me" => "nullable"
        ]);
        if (Auth::attempt(["email" => $request->email, "password" => $request->password], $request->boolean("remember_me"))) {
            if (Auth::user()->is_admin == 1) {
                session()->flash("success", "You are logged");
                return redirect()->route("admin.home");
            }
            return redirect()->route("home");
        }
        session()->flash("error", "Incorrect email or password");
        return redirect()->back();
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route("login.index");
    }
}

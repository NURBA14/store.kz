<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Mockery\Generator\StringManipulation\Pass\Pass;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
        return view("user.reset-password", compact("request"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "token" => "required",
            "email" => "required|email",
            "password" => "required|confirmed"
        ]);
        $status = Password::reset($request->only("email", "password", "password_confirmation", "token"), function ($user) use ($request) {
            $user->forceFill([
                "password" => Hash::make($request->password),
                "remember_token" => Str::random(60)
            ])->save();
        });


        if ($status == Password::PASSWORD_RESET) {
            session()->flash("success", trans($status));
            return redirect()->route("login.index");
        }
        session()->flash("error", trans($status));
        return redirect()->back();
    }

}

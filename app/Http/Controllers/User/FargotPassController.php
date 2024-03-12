<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class FargotPassController extends Controller
{
    public function index()
    {
        return view("user.fargot");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email"
        ]);
        $status = Password::sendResetLink([
            "email" => $request->email
        ]);
        if ($status == Password::RESET_LINK_SENT) {
            session()->flash("success", trans($status));
            return redirect()->back();
        }
        session()->flash("error", trans($status));
        return redirect()->back();
    }
}

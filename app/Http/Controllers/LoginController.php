<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->username == "admin" && $request->password == "1234") {

            session(['username' => $request->username]);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        session()->forget('username');
        return redirect('/');
    }
}

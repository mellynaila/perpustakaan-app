<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // validasi
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // proses login
        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            // ambil role
            $role = Auth::user()->role;

            // redirect pakai route name (LEBIH AMAN)
            if ($role === 'admin') {
                return redirect()->route('dashboard');
            }

            if ($role === 'anggota') {
                return redirect()->route('anggota.dashboard');
            }

            // fallback
            Auth::logout();
            return redirect('/login')->with('error', 'Role tidak dikenali');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

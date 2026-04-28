<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', $request->username)
            ->first();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan');
        }

        if ($request->password != $user->password) {
            return back()->with('error', 'Password salah');
        }

        session([
            'user_id' => $user->id,
            'username' => $user->name,
            'role' => $user->role
        ]);

        if ($user->role == 'admin') {
            return redirect('/dashboard');
        } else {
            return redirect('/dashboard');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}

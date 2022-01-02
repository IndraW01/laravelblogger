<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.Login.index');
    }

    public function check(AuthRequest $request)
    {
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended(route('blogs.index'));
        }

        return back()->with('failed', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('blogs.index');
    }
}

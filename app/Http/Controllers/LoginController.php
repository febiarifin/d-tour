<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.auth.login',[
            'title'=>'Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' =>'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt(['email'=>$credentials['email'],'password'=> $credentials['password'],'role'=>'admin'])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('failed','Email atau password salah');
    }

}

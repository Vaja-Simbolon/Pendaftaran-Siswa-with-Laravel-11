<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view ('login.index');
    }
    public function proses(Request $request){
        $credential = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib di isi!',
            'email.email'=>'Format email tidak valid!',
            'password.required'=>'Password wajib di isi!'
            // 'password.confirmed'=>'Password salah!'
        ]);
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Selamat Datang!!');;
        }

        return back()->withErrors([
            'email' => 'Autentikasi Gagal!',
        ])->onlyInput('email');
    }
    public function keluar(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}

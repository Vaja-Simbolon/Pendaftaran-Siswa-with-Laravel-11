<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function index2()
    {
        // Mendapatkan pengguna yang sedang login
        $user = auth()->user();

        // Mengirim variabel $user ke view
        return view('layout.navbar', compact('user'));
    }
}

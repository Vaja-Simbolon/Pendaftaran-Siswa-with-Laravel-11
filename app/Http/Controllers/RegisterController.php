<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:8|string|',
        ],[
            'name.required'=>'Username wajib di isi!',
            'email.required'=>'Email wajib di isi!',
            'email.email'=>'Format email tidak valid!',
            'password.required'=>'Password wajib di isi!',
            'password.min'=>'Password minimal 8 karakter!', 
            'password.string'=>'Password harus menggunakan huruf!' 
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        session()->flash('success', 'Berhasil Didaftarkan!');
        return redirect()->route('login');
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

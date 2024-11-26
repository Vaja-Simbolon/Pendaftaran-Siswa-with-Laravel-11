<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(){
        $user = User::findOrFail(Auth::id());

    return view('layout/profil', compact('user'));
    }
    public function update(Request $request, $id)
{
    request()->validate([
        'name'       => 'required|string|min:2|max:100',
        'email'      => 'required|email|unique:users,email, ' . $id . ',id',
        'old_password' => 'nullable|string',
        'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
    ]);

    $user = User::find($id);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('old_password')) {
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        } else {
            return back()
                ->withErrors(['old_password' => __('Please enter the correct password')])
                ->withInput();
        }
    }

    if ($request->hasFile('photo')) {
        // Hapus foto lama jika ada
        if ($user->photo && Storage::exists('public/photos/' . $user->photo)) {
            Storage::delete('public/photos/' . $user->photo);
        }
    
        // Simpan foto baru ke 'public/photos' dan simpan namanya di database
        $filePath = $request->file('photo')->store('photos', 'public');
        $user->photo = basename($filePath);
    }
    


    $user->save();

    return back()->with('success', 'Profile berhasil di update!');
}
}

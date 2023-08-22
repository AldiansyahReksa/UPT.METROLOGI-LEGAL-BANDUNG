<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function actionregister(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:8', // Validasi password minimal 8 karakter
        ], [
            'password.min' => 'Password harus memiliki minimal 8 karakter.', // Pesan error kustom untuk validasi min
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'namapemilikuttp' => $request->namapemilikuttp,
            'alamat' => $request->alamat,
            'notelp' => $request->notelp,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'role' => $request->role,
            // 'active' => 1
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }
}
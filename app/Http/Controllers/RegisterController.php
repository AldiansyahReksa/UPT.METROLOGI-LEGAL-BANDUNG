<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Pengguna; // Add this line to import the Pengguna model

class RegisterController extends Controller
{
    public function register()
    {
        return view('logins.register');
    }
    
    public function actionregister(Request $request)
    {
        $pengguna = Pengguna::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama' => $request->namapemilikuttp,
            'alamat' => $request->alamat,
            'jabatan' => $request->jabatan,
        ]);
    
        Session::flash('message', 'Registration successful. Please login with your credentials.');
        return redirect('/register');
    }
};

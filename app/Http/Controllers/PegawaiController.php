<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PegawaiModel;

class PegawaiController extends Controller
{
    public function tampilPegawai()
    {
        $pegawai = PegawaiModel::all();
                
        return view('tampilpegawai', ['pegawai' => $pegawai]);
    }

    public function tambahpegawai()
    {
        return view('tambahpegawai');
    }

    public function simpanpegawai(Request $request)
    {
        $pegawai = PegawaiModel::create([
            'nm_pegawai' => $request->nm_pegawai,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'divisi' => $request->divisi,
            'jns_kelamin' => $request->jns_kelamin,
            'email' => $request->email,
        ]);

        return redirect()->route('tampilpegawai');
    }
    public function ubahpegawai($id)
{
   $pegawai = PegawaiModel::select('*')
             ->where('id', $id)
             ->get();

   return view('ubahpegawai', ['pegawai' => $pegawai]);
}

    public function updatepegawai(Request $request)
{
   $pegawai = PegawaiModel::where('id', $request->id)
             ->update([
                    'nm_pegawai' => $request->nm_pegawai,
                    'tmpt_lahir' => $request->tmpt_lahir,
                    'tgl_lahir' => $request->tgl_lahir,
                    'alamat' => $request->alamat,
                    'divisi' => $request->divisi,
                    'jns_kelamin' => $request->jns_kelamin,
                    'email' => $request->email,
             ]);

   return redirect()->route('tampilpegawai');
}

    public function hapuspegawai($id)
{
    $pegawai = PegawaiModel::where('id', $id)
              ->delete();

    return redirect()->route('tampilpegawai');
}
}
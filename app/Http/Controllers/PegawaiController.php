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
        // dd($request->all());
        $pegawai = PegawaiModel::create([
            'nm_pegawai' => $request->nm_pegawai,
            'tmpt_tgl_lahir' => $request->tmpt_tgl_lahir,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'pangkat' => $request->pangkat,
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
                    'tmpt_tgl_lahir' => $request->tmpt_tgl_lahir,
                    'nip' => $request->nip,
                    'jabatan' => $request->jabatan,
                    'pangkat' => $request->pangkat,
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
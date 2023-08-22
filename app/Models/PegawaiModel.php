<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;

    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['nm_pegawai', 'tmpt_lahir', 'tgl_lahir', 'alamat', 'divisi', 'jns_kelamin', 'email'];
}

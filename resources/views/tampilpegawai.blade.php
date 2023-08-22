@extends('homemenu')

@section('konten')
<h3>Tampil Data Pegawai</h3>
<a class="btn btn-success" href="/pegawai/tambah"><i class="fa fa-plus"></i> Tambah Pegawai</a><br><br>
<table class="table table-bordered table-hover">
  <tr>
    <th>#ID</th>
    <th>Nama Pegawai</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Alamat</th>
    <th>Divisi</th>
    <th>Jenis Kelamin</th>
    <th>Email</th>
    <th>Aksi</th>
  </tr>
  @foreach($pegawai as $p) 
  <tr>
    <td>{{$p->id}}</td>
    <td>{{$p->nm_pegawai}}</td>
    <td>{{$p->tmpt_lahir}}</td>
    <td>{{$p->tgl_lahir}}</td>
    <td>{{$p->alamat}}</td>
    <td>{{$p->divisi}}</td>
    <td>{{$p->jns_kelamin}}</td>
    <td>{{$p->email}}</td>
    <td>
      <a href="/pegawai/ubah/{{$p->id}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/pegawai/hapus/{{$p->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
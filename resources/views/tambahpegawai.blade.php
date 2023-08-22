@extends('homemenu')

@section('konten')
<h3>Form Input Pegawai</h3>
<form method="post" action="{{route('simpanpegawai')}}">
  @csrf
  <div class="form-group">
    <label>Nama Pegawai</label>
    <input type="text" name="nm_pegawai" class="form-control" placeholder="Nama Pegawai" required="">
  </div>
  <div class="form-group">
    <label>Tempat Lahir</label>
    <input type="text" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir" required="">
  </div>
  <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="">
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat" required=""></textarea>
  </div>
  <div class="form-group">
    <label>Divisi</label>
    <input type="text" name="divisi" class="form-control" placeholder="Divisi" required="">
  </div>
  <div class="form-group">
    <label>Jenis Kelamin</label>
    <input type="text" name="jns_kelamin" class="form-control" placeholder="Jenis Kelamin" required="">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" placeholder="Email" required="">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection
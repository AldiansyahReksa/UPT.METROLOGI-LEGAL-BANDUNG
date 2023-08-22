@extends('homemenu')

@section('konten')
<h3>Ubah Data Pegawai</h3>
  @foreach($pegawai as $p)
    <form method="post" action="/pegawai/update">
      @csrf
      <input type="hidden" name="id" value="{{$p->id}}">
      <div class="form-group">
        <label>Nama Pegawai</label>
        <input type="text" name="nm_pegawai" value="{{$p->nm_pegawai}}" class="form-control" placeholder="Nama Pegawai" required="">
      </div>
      <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tmpt_lahir" value="{{$p->tmpt_lahir}}" class="form-control" placeholder="Tempat Lahir" required="">
      </div>
      <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" value="{{$p->tgl_lahir}}" class="form-control" placeholder="Tanggal Lahir" required="">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat" required="">{{$p->alamat}}</textarea>
      </div>
      <div class="form-group">
        <label>Divisi</label>
        <input type="text" name="divisi" value="{{$p->divisi}}" class="form-control" placeholder="Divisi" required="">
      </div>
      <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="text" name="jns_kelamin" value="{{$p->jns_kelamin}}" class="form-control" placeholder="Jenis Kelamin" required="">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="{{$p->email}}" class="form-control" placeholder="Email" required="">
      </div>
      <div class="form-group text-right">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
      </div>
    </form>
  @endforeach
@endsection
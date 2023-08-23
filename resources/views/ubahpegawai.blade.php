<!-- @extends('homemenu')

@section('konten')
<h3>Ubah Data Pegawai</h3> -->
<x-pegawai>
    <x-slot name="title">
        Data Pegawai
    </x-slot>

  @foreach($pegawai as $p)
    <form method="post" action="/pegawai/update">
      @csrf
      <input type="hidden" name="id" value="{{$p->id}}">
      <div class="form-group">
        <label>Nama Pegawai</label>
        <input type="text" name="nm_pegawai" value="{{$p->nm_pegawai}}" class="form-control" placeholder="Nama Pegawai" required="">
      </div>
      <div class="form-group">
        <label>Tempat, Tanggal Lahir</label>
        <input type="text" name="tmpt_tgl_lahir" value="{{$p->tmpt_tgl_lahir}}" class="form-control" placeholder="Tempat, Tanggal Lahir" required="">
      </div>
      <div class="form-group">
        <label>NIP</label>
        <input type="text" name="nip" value="{{$p->nip}}" class="form-control" placeholder="NIP" required="">
      </div>
      <div class="form-group">
        <label>Jabatan</label>
        <input type="text" name="jabatan" value="{{$p->jabatan}}" class="form-control" placeholder="Jabatan" required="">
      </div>
      <div class="form-group">
        <label>Pangkat</label>
        <input type="text" name="pangkat" value="{{$p->pangkat}}" class="form-control" placeholder="Pangkat" required="">
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
  </x-pegawai>
<!-- @endsection -->
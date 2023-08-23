<x-pegawai>
    <x-slot name="title">
        Tambah Pegawai
    </x-slot>

<h3>Form Input Pegawai</h3>
<form method="post" action="{{route('simpanpegawai')}}">
  @csrf
  <div class="form-group">
    <label>Nama Pegawai</label>
    <input type="text" name="nm_pegawai" class="form-control" placeholder="Nama Pegawai" required="">
  </div>
  <div class="form-group">
    <label>Tempat, Tanggal Lahir</label>
    <input type="text" name="tmpt_tgl_lahir" class="form-control" placeholder="Tempat, Tanggal Lahir">
  </div>
  <div class="form-group">
    <label>NIP</label>
    <input type="text" name="nip" class="form-control" placeholder="NIP" required="">
  </div>
  <div class="form-group">
    <label>Jabatan</label>
    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required="">
  </div>
  <div class="form-group">
    <label>Pangkat</label>
    <input type="text" name="pangkat" class="form-control" placeholder="Pangkat" required="">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" placeholder="Email">
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>

</x-pegawai>
<x-pegawai>
    <x-slot name="title">
        Data Pegawai
    </x-slot>
    
<table class="table table-bordered table-hover">
  <tr>
    <th>#ID</th>
    <th>Nama Pegawai</th>
    <th>Tempat, Tanggal Lahir</th>
    <th>NIP</th>
    <th>Jabatan</th>
    <th>Pangkat</th>
    <th>Email</th>
    <th>Aksi</th>
  </tr>
  @foreach($pegawai as $p) 
  <tr>
    <td>{{$p->id}}</td>
    <td>{{$p->nm_pegawai}}</td>
    <td>{{$p->tmpt_tgl_lahir}}</td>
    <td>{{$p->nip}}</td>
    <td>{{$p->jabatan}}</td>
    <td>{{$p->pangkat}}</td>
    <td>{{$p->email}}</td>
    <td>
      <a href="/pegawai/ubah/{{$p->id}}" class="btn btn-success btn-sm"><i class="fa fa-pencil">Ubah</i></a>
      <a href="/pegawai/hapus/{{$p->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash">Hapus</i></a>
    </td>
  </tr>
  @endforeach
</table>
</x-pegawai>
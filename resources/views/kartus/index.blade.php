<x-bootstrap>
  <x-slot name="title">
    Daftar Pemilik UTTP
  </x-slot>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Pemilik UTTP</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Alamat</th>
        <th scope="col">Kelurahan</th>
        <th scope="col">Kecamatan</th>
        <th scope="col">Lihat Data / Hapus Data</th>

      </tr>
    </thead>
    <tbody class>
      @foreach ($kartus as $kartu)
      <tr>
        <th scope="row">{{ $kartu->id }}</th>
        <td>{{ $kartu->pemilik_uttp }}</td>
        <td>{{ $kartu->nomor_telepon }}</td>
        <td>{{ $kartu->alamat }}</td>
        <td>{{ $kartu->kelurahan }}</td>
        <td>{{ $kartu->kecamatan }}</td>
        
        <td>
          <a href="/kartu/{{ $kartu->id }}" class="btn btn-info btn-sm">
          Lihat Data
          </a>
    <a href="{{ route('kartu.delete', ['id' => $kartu->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">
        Hapus Data
    </a>
</td>


      </tr>
      
      @endforeach
    </tbody>
  </table>
</x-bootstrap>
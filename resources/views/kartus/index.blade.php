<x-bootstrap>
  <x-slot name="title">
    KARTU ORDER
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
        <td class="text-center">
          <a href="/kartu/{{ $kartu->id }}">
            <i class="bi-search"></i>
          </a>
        </td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
</x-bootstrap>
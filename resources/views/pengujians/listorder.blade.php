<x-bootstrap>
    <x-slot name="title">
        Detail Kartu Order
    </x-slot>

    <!-- Display the kartu details -->


    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nama Pemilik</th>
                <td>{{ $kartu->pemilik_uttp }}</td>
            </tr>
            <tr>
                <th scope="row">Nomor telepon</th>
                <td>{{ $kartu->nomor_telepon }}</td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>{{ $kartu->alamat }}</td>
            </tr>
            <tr>
                <th scope="row">Nomor Kartu Order</th>
                <td>{{ $kartuorder->id }}</td>
            </tr>
            <tr>
                <th scope="row">Tanggal</th>
                <td>{{ $kartuorder->created_at ? $kartuorder->created_at->isoformat('D MMMM Y') : '' }}</td>
            </tr>
        </tbody>
    </table>

    <hr />

    <!-- Button to create an order for this kartu -->
    {{-- <h2>Isi Kartu Order</h2>
    <a href="/order/form/{{ $kartu->id }}/{{ $kartuorder->id }}" class="btn btn-primary" >Tambah Alat UTTP</a>
    <a href="/" class="btn btn-primary">Halaman Utama</a>
    <hr /> --}}

    <!-- Display orders related to this kartu -->
    <h2>Daftar Alat UTTP</h2>

    @if (count($kartuorder->orders) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Jenis Alat UTTP</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Tipe Atau Model</th>
                    <th scope="col">Nomor Seri</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jenis Pengukuran</th>
                    <th scope="col">Jumlah AT</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kartuorder->orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->jenis_alat_uttp }}</td>
                        <td>{{ $order->merek }}</td>
                        <td>{{ $order->tipe_atau_model }}</td>
                        <td>{{ $order->nomor_seri }}</td>
                        <td>{{ $order->kapasitas }} x {{ $order->skala }} </td>
                        <td>{{ $order->kelas }}</td>
                        <td>{{ $order->jenis_pengukuran }}</td>
                        <td>{{ $order->jumlah_at }}</td>
                        <td>{{ $order->keterangan }}</td>
                        <td> 
                            <a href="/order/print/{{ $kartu->id }}/{{$order->id}}" class="btn btn-success btn-sm" target="_blank">Uji</a>
                            {{-- <a href="/order/print/{{ $kartu->id }}/{{$order->id}}" class="btn btn-primary btn-sm" target="_blank">Cetak PDF</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Empty Data</p>
    @endif
</x-bootstrap>

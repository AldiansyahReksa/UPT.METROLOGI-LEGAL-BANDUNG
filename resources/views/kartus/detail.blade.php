<x-bootstrap>
    <x-slot name="title">
        Lihat Kartu Order
    </x-slot>

    <!-- Display the kartu details -->
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{ $kartu->id }}</td>
            </tr>
            <tr>
                <th scope="row">Nama Pemilik</th>
                <td>{{ $kartu->pemilik_uttp }}</td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>{{ $kartu->alamat }}</td>
            </tr>
            <tr>
                <th scope="row">Nomor telepon</th>
                <td>{{ $kartu->nomor_telepon }}</td>
            </tr>
            <tr>
                <th scope="row">Kelurahan</th>
                <td>{{ $kartu->kelurahan }}</td>
            </tr>
            <tr>
                <th scope="row">Kecamatan</th>
                <td>{{ $kartu->kecamatan }}</td>
            </tr>
        </tbody>
    </table>

    <hr />

    <!-- Button to create an order for this kartu -->
    <h2>Isi Kartu Order</h2>
    <a href="{{ route('order.form', ['kartu_id' => $kartu->id]) }}" class="btn btn-primary">Isi Kartu Order</a>
    <a href="/" class="btn btn-primary">Halaman Utama</a>
    <hr />

    <!-- Display orders related to this kartu -->
    <h2>Kartu Order</h2>

    @if (count($kartu->orders) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Jenis Alat UTTP</th>
                    <th scope="col">Merek</th>
                    <th scope="col">Tipe Atau Model</th>
                    <th scope="col">Nomor Seri</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Jenis Pengukuran</th>
                    <th scope="col">Jumlah AT</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kartu->orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->jenis_alat_uttp }}</td>
                        <td>{{ $order->merek }}</td>
                        <td>{{ $order->tipe_atau_model }}</td>
                        <td>{{ $order->nomor_seri }}</td>
                        <td>{{ $order->kapasitas }}</td>
                        <td>{{ $order->kelas }}</td>
                        <td>{{ $order->jenis_pengukuran }}</td>
                        <td>{{ $order->jumlah_at }}</td>
                        <td>{{ $order->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Empty Data</p>
    @endif
</x-bootstrap>

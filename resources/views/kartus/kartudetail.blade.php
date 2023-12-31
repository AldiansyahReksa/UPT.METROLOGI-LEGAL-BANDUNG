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
                <th scope="row">Nomor telepon</th>
                <td>{{ $kartu->nomor_telepon }}</td>
            </tr>
            <tr>
                <th scope="row">Alamat</th>
                <td>{{ $kartu->alamat }}</td>
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
    <h2>Buat Kartu Order Baru</h2>
    <a href="{{ route('kartuorder.form', ['kartu_id' => $kartu->id]) }}" class="btn btn-primary">Buat Baru</a>
    
    <hr />

    <!-- Display orders related to this kartu -->
    <h2>Daftar Kartu Order</h2>



    @if (count($kartu->kartuorders) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No. Order</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kartu->Kartuorders as $kartuorder)
                    <tr>
                        <th scope="row">{{ $kartuorder->formatted_id }}</th>
                        <td>{{ $kartuorder->created_at ? $kartuorder->created_at->isoformat('D MMMM Y') : '' }}</td>

                        <td>
                        <a href="/kartuorder/{{ $kartu->id }}/{{ $kartuorder->id }}" class="btn btn-info btn-sm">
                        Lihat Detail
                        </a>

   
                            {{-- <a href="/order/print/{{ $kartu->id }}/{{$order->id}}" class="btn btn-success btn-sm" target="_blank">Uji</a>
                            <a href="/order/print/{{ $kartu->id }}/{{$order->id}}" class="btn btn-primary btn-sm" target="_blank">Cetak PDF</a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Empty Data</p>
    @endif
    
    <hr>
    <a href="/index" class="btn btn-primary">Halaman Utama</a>
    <hr>
</x-bootstrap>

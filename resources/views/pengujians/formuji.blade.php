<x-bootstrap>
    <x-slot name="title">
        Form Pengujian
    </x-slot>

    <!-- Display the kartu details -->


    <h4>Detail Pemilik</h4>
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
                <td>{{ $kartuorder->formatted_id }}</td>
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
    <h4>Detail Alat UTTP</h4>

    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Jenis Alat UTTP</th>
                <td>{{ $order->jenis_alat_uttp }}</td>
            </tr>
            <tr>
                <th scope="row">Merek</th>
                <td>{{ $order->merek }}</td>
            </tr>
            <tr>
                <th scope="row">Tipe atau Model</th>
                <td>{{ $order->tipe_atau_model }}</td>
            </tr>
            <tr>
                <th scope="row">Nomor Seri</th>
                <td>{{ $order->nomor_seri }}</td>
            </tr>
            <tr>
                <th scope="row">Kapasitas</th>
                <td>{{ $order->kapasitas }} x {{ $order->skala }}</td>
            </tr>
            <tr>
                <th scope="row">Kelas</th>
                <td>{{ $order->kelas }}</td>
            </tr>
            <tr>
                <th scope="row">Jenis Pengukuran</th>
                <td>{{ $order->jenis_pengukuran }}</td>
            </tr>
            <tr>
                <th scope="row">Minimum Menimbang</th>
                <td>{{ $minimum_menimbang }}</td>
            </tr>
        </tbody>
    </table>

    <hr>


        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Standar</th>
                    <th scope="col" class="col-4">Penunjukan Alat</th>
                    <th scope="col">Kesalahan Alat</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>0</td>
                    <td>
                        <input type="number" name="penunjukanzero" class="form-control" placeholder="penunjukan">
                    </td>
                    <td></td>
                </tr> 
                <tr>
                    <td>{{ $minimum_menimbang }}</td>
                    <td>
                        <input type="number" name="penunjukanminimum" class="form-control" placeholder="penunjukan">
                    </td>    
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $bkd1 }}</td>
                    <td>
                        <input type="number" name="penunjukanbkd1" class="form-control" placeholder="penunjukan">
                    </td>
                    <td></td>
                </tr>    
                <tr>
                    <td>{{ $bkd2 }}</td>
                    <td>
                        <input type="number" name="penunjukanbkd2" class="form-control" placeholder="penunjukan">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>{{ $bkd3 }}</td>
                    <td>
                        <input type="number" name="penunjukanbkd3" class="form-control" placeholder="penunjukan">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
</x-bootstrap>

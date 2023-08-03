<x-bootstrap>
    <x-slot name="title">
        Order Details
    </x-slot>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    <div class="card">
        <div class="card-header">
            Order Details for ID: {{ $order->id }}
        </div>
        <div class="card-body">
            <p>Jenis Alat UTTP: {{ $order->jenis_alat_uttp }}</p>
            <p>Merek: {{ $order->merek }}</p>
            <p>Tipe/Model: {{ $order->tipe_atau_model }}</p>
            <p>Nomor/seri: {{ $order->nomor_seri }}</p>
            <p>Kapasitas: {{ $order->kapasitas }}</p>
            <p>Kelas: {{ $order->kelas }}</p>
            <p>Jenis Pegukuran: {{ $order->jenis_pengukuran }}</p>
            <p>Jumlah AT: {{ $order->jumlah_at }}</p>
            <p>Keterangan: {{ $order->keterangan }}</p>
            <!-- Display other order details here -->
        </div>
    </div>
</x-bootstrap>

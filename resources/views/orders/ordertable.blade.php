@if (count($kartu_order) > 0)
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No. Order</th>
            <th scope="col">Nama Pemilik </th>
            <th scope="col">Tanggal</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kartu_order as $kartuorder)
            <tr>
                <th scope="row">{{ $kartuorder->formatted_id }}</th>
                <td>{{ $kartuorder->kartu->pemilik_uttp }}</td>
                <td>{{ $kartuorder->created_at ? $kartuorder->created_at->isoformat('D MMMM Y') : '' }}</td>
                
                <td> 
                    <a href="/kartuorder/{{ $kartuorder->kartu->id }}/{{ $kartuorder->id }}" class="btn btn-info btn-sm">
          Lihat Data
          </a>
                    </a>
            
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
    <p>Empty Data</p>
@endif
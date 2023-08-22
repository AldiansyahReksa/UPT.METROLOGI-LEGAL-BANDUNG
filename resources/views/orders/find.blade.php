<x-bootstrap>
    <x-slot name="title">
        Cari Kartu Order
    </x-slot>

    

    <form id="search-form" class="row">
        <div class="col-md-8">
            <h2>Daftar Kartu Order</h2>
        </div>
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Cari No. Order atau Nama">
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <div id="search-result">
        @include('orders.ordertable', ['kartu_order' => $kartu_order])
    {{-- @if (count($kartu_order) > 0)
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
                        <th scope="row">{{ $kartuorder->id }}</th>
                        <td>{{ $kartuorder->kartu->pemilik_uttp }}</td>
                        <td>{{ $kartuorder->created_at ? $kartuorder->created_at->isoformat('D MMMM Y') : '' }}</td>
                        
                        <td> 
                            <a href="/pengujian/{{ $kartuorder->kartu->id }}/{{ $kartuorder->id }}">
                                <i class="bi-search"></i>
                            </a>
                    
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Empty Data</p>
    @endif --}}
</div>

<!-- Including jQuery and the AJAX script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#search-form').on('submit', function(e){
            e.preventDefault();
            const searchTerm = $('[name="search"]').val();

            $.ajax({
                type: 'GET',
                url: '{{ route('kartuorder') }}',
                data: {search: searchTerm},
                success: function(data) {
                    $('#search-result').html(data);
                }
            });
        });
    });
</script>

</x-bootstrap>

<x-bootstrap>
    <x-slot name="title">
        Find Pemilik UTTP
    </x-slot>

    <h2>Find Pemilik UTTP</h2>
    <form action="{{ route('kartu.find') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search_query" placeholder="Search Pemilik UTTP">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>

    <h3>Search Results</h3>
    @if ($kartus->count() > 0)
        <ul>
            @foreach ($kartus as $kartu)
             
                    <a href="{{ url('/kartu/' . $kartu->id) }}">
                        {{ $kartu->pemilik_uttp }}
                    </a>
             
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
    <a href="{{ route('kartu.find') }}" class="btn btn-primary">Back</a>
    <a href="/" class="btn btn-primary">Halaman Utama</a>
</x-bootstrap>

<x-bootstrap>
  <x-slot name="title">
    Formulir Pemilik UTTP
  </x-slot>
  @if ($errors->any())
    <div class="alert alert-danger">
      Validation Error!
    </div>
  @endif

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form action="/kartu/with-model" method="POST">
    @csrf

    
    <div class="mb-3">
      <label for="pemilik_uttp" class="form-label">Pemilik UTTP</label>
      <input type="text" class="form-control  @error('pemilik_uttp') is-invalid @enderror" id="pemilik_uttp" name="pemilik_uttp" value="{{ old('pemilik_uttp') }}" placeholder="Nama Pemilik / Perusahaan">
      <div class="@error('pemilik_uttp') @enderror invalid-feedback">
        @foreach ($errors->get('pemilik_uttp') as $message)
          {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
      <div class="@error('alamat') @enderror invalid-feedback">
        @foreach ($errors->get('alamat') as $message)
          {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
      <input type="text" class="form-control  @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Nomor Telepon">
      <div class="@error('nomor_telepon') @enderror invalid-feedback">
        @foreach ($errors->get('nomor_telepon') as $message)
          {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="kelurahan" class="form-label">Kelurahan</label>
      <input type="text" class="form-control  @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}" placeholder="Kelurahan">
      <div class="@error('kelurahan') @enderror invalid-feedback">
        @foreach ($errors->get('kelurahan') as $message)
          {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="kecamatan" class="form-label">Kecamatan</label>
      <input type="text" class="form-control  @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}" placeholder="Kecamatan">
      <div class="@error('kecamatan') @enderror invalid-feedback">
        @foreach ($errors->get('kecamatan') as $message)
          {{ $message }}
        @endforeach
      </div>
    </div>
      
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/" class="btn btn-primary">Halaman Utama</a>
  </form>
</x-bootstrap>
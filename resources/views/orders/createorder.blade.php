<x-bootstrap>
    <x-slot name="title">
        Formulir Kartu Order
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

    <form action="{{ url('/order/with-model') }}" method="POST">
        @csrf
        <!-- If $kartu is not null, display the kartu_id field -->
        @if ($kartu)
            <div class="mb-3">
                <label for="kartu_id" class="form-label">Nama Pemilik</label>
                <input type="hidden" name="kartu_id" value="{{ $kartu->id }}">
                <input type="text" class="form-control" disabled value="{{ $kartu->pemilik_uttp }}" placeholder="Id Pemilik">
            </div>
        @endif


    <div class="mb-3">
      <label for="jenis_alat_uttp" class="form-label">Jenis Alat UTTP</label>
      <input type="text" class="form-control  @error('jenis_alat_uttp') is-invalid @enderror" id="jenis_alat_uttp" name="jenis_alat_uttp" value="{{ old('jenis_alat_uttp') }}" placeholder="jenis alat uttp">
      <div class="@error('jenis_alat_uttp') @enderror invalid-feedback">
        @foreach ($errors->get('jenis_alat_uttp') as $message)
        {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="merek" class="form-label">Merek</label>
      <input type="text" class="form-control  @error('merek') is-invalid @enderror" id="merek" name="merek" value="{{ old('merek') }}" placeholder="Merek">
      <div class="@error('merek') @enderror invalid-feedback">
        @foreach ($errors->get('merek') as $message)
        {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="tipe_atau_model" class="form-label">Tipe Atau Model</label>
      <input type="text" class="form-control  @error('tipe_atau_model') is-invalid @enderror" id="tipe_atau_model" name="tipe_atau_model" value="{{ old('tipe_atau_model') }}" placeholder="Tipe Atau Model">
      <div class="@error('tipe atau model') @enderror invalid-feedback">
        @foreach ($errors->get('tipe_atau_model') as $message)
        {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="nomor_seri" class="form-label">Nomor Seri</label>
      <input type="text" class="form-control  @error('nomor_seri') is-invalid @enderror" id="nomor_seri" name="nomor_seri" value="{{ old('nomor_seri') }}" placeholder="Nomor Seri">
      <div class="@error('tipe atau model') @enderror invalid-feedback">
        @foreach ($errors->get('nomor_seri') as $message)
        {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="kapasitas" class="form-label">kapasitas</label>
      <input type="text" class="form-control  @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}" placeholder="kapasitas">
      <div class="@error('kapasitas') @enderror invalid-feedback">
        @foreach ($errors->get('kapasitas') as $message)
        {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="kelas" class="form-label">Kelas</label>
      <input type="text" class="form-control  @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas') }}" placeholder="Kelas">
      <div class="@error('kelas') @enderror invalid-feedback">
        @foreach ($errors->get('kelas') as $message)
        {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
  <label for="jenis_pengukuran" class="form-label">Jenis Pengukuran</label>
  <select class="form-select @error('jenis_pengukuran') is-invalid @enderror" id="jenis_pengukuran" name="jenis_pengukuran">
    <option value="Tera" {{ old('jenis_pengukuran') == 'Tera' ? 'selected' : '' }}>Tera</option>
    <option value="Tera Ulang" {{ old('jenis_pengukuran') == 'Tera Ulang' ? 'selected' : '' }}>Tera Ulang</option>
  </select>
  <div class="@error('jenis_pengukuran') @enderror invalid-feedback">
    @foreach ($errors->get('jenis_pengukuran') as $message)
    {{ $message }}
    @endforeach
  </div>
</div>


    <div class="mb-3">
      <label for="jumlah_at" class="form-label">Jumlah AT</label>
      <input type="text" class="form-control  @error('jumlah_at') is-invalid @enderror" id="jumlah_at" name="jumlah_at" value="{{ old('jumlah_at') }}" placeholder="Jumlah AT">
      <div class="@error('jumlah_at') @enderror invalid-feedback">
        @foreach ($errors->get('jumlah_at') as $message)
        {{ $message }}
        @endforeach
      </div>
    </div>

    <div class="mb-3">
      <label for="keterangan" class="form-label">Keterangan</label>
      <input type="text" class="form-control  @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder="Keterangan">
      <div class="@error('keterangan') @enderror invalid-feedback">
        @foreach ($errors->get('keterangan') as $message)
        {{ $message }}
        @endforeach
      </div>
    </div> 

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ url('/kartu/' . $kartu->id) }}" class="btn btn-secondary">Kembali</a>

    <a href="/" class="btn btn-primary">Halaman Utama</a>
  </form>
</x-bootstrap>
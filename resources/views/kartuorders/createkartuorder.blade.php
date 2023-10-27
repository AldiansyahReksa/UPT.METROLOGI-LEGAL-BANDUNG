<x-bootstrap>
    <x-slot name="title">
        Formulir Kartu Order
    </x-slot>
    @if ($errors->any())
        <div class="alert alert-danger">
            Kolom Wajib Diisi!
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/kartuorder/with-model') }}" method="POST">
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
      <input type="text" class="form-control  @error('jenis_alat_uttp') is-invalid @enderror" id="jenis_alat_uttp" name="jenis_alat_uttp" value="{{ old('jenis_alat_uttp') }}" placeholder="Jenis Alat UTTP">
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
    <label for="kapasitas" class="form-label">Kapasitas (gram)</label>
    <input type="text" class="form-control  @error('kapasitas') is-invalid @enderror" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}" data-decimal-separator="." placeholder="Kapasitas">
    <div class="@error('kapasitas') @enderror invalid-feedback">
        @foreach ($errors->get('kapasitas') as $message)
        {{ $message }}
        @endforeach
    </div>
</div>

<div class="mb-3">
    <label for="skala" class="form-label">Skala (gram)</label>
    <input type="text" class="form-control  @error('skala') is-invalid @enderror" id="skala" name="skala" value="{{ old('skala') }}" data-decimal-separator="." placeholder="Skala">
    <div class="@error('skala') @enderror invalid-feedback">
        @foreach ($errors->get('skala') as $message)
        {{ $message }}
        @endforeach
    </div>
</div>


<div class="mb-3">
    <label for="hasil_skala" class="form-label">Hasil Skala</label>
    <input type="text" class="form-control" id="hasil_skala" name="hasil_skala" value="{{ old('hasil_skala') }}" placeholder="" readonly>
</div>


<div class="mb-3">
    <label for="kelas" class="form-label">Kelas</label>
    <input type="text" class="form-control  @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas') }}" placeholder="" readonly>
    <div class="@error('kelas') @enderror invalid-feedback">
        @foreach ($errors->get('kelas') as $message)
        {{ $message }}
        @endforeach
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function updateKelasAndHasilSkala() {
            let kapasitas = parseFloat($('#kapasitas').val());
            let skala = parseFloat($('#skala').val());

            if (isNaN(kapasitas) || isNaN(skala) || skala === 0) {
                $('#kelas').val('');
                $('#hasil_skala').val('');
                return;
            }

            let totalKapasitas = kapasitas / skala;
            let kelas;
            if (totalKapasitas >= 10000) {
                kelas = ' II';
            } else if (totalKapasitas >= 1000) {
                kelas = ' III';
            } else {
                kelas = ' IIII';
            }
            $('#kelas').val(kelas);

            // Calculate and display "Hasil Skala"
            let hasilSkala = (kapasitas / skala).toFixed(2);
            $('#hasil_skala').val(hasilSkala);
        }

        $('#kapasitas, #skala').on('input', function () {
            let value = $(this).val();
            // Use the custom attribute "data-decimal-separator" to determine the decimal separator
            let decimalSeparator = $(this).data('decimal-separator');
            // Replace the comma with the decimal separator in the input
            value = value.replace(',', decimalSeparator);
            // Check if the value is a valid number
            if (!$.isNumeric(value)) {
                $(this).val('');
            } else {
                $(this).val(value);
            }
            updateKelasAndHasilSkala();
        });

        // Call updateKelasAndHasilSkala() initially to set the initial values of "kelas" and "hasil_skala"
        updateKelasAndHasilSkala();
    });
</script>










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

    <a href="/index" class="btn btn-primary">Halaman Utama</a>
  </form>
</x-bootstrap>
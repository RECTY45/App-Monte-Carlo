@extends('layouts.main')
@section('content')
    <div class="container-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y my-5">
            <div class="card mb-4">
                <div class="card">
                    <h5 class="card-header">Tambah Data Distribusi</h5>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Pilih Permintaan</label>
                                    <select id="permintaan" class="form-select" aria-label="Default select example">
                                        <option selected>Silahkan Pilih Permintaan</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->frekuensi_permintaan }}">
                                                {{ $item->frekuensi_permintaan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3  {{ count($itemData) ? '' : 'd-none' }}">
                                    <label class="form-label">Pilih Komulatif</label>
                                    <select id="komulatif" class="form-select" aria-label="Default select example">
                                        <option selected>Silahkan Pilih Komulatif sebelumnya </option>
                                        @foreach ($itemData as $item)
                                        <option value="{{ $item->distribusi_komulatif }}">
                                            {{ $item->distribusi_komulatif  }}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('dstore') }}">
                                    @csrf
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="multicol-permintaan">Distribusi Densitas</label>
                                            <input type="text" id="multicol-densitas"
                                                class="form-control @error('distribusi_densitas') is-invalid @enderror"
                                                placeholder="0.00" name="distribusi_densitas" readonly>
                                            @error('distribusi_densitas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="multicol-komulatif">Distribusi Komulatif</label>
                                            <input type="text" id="multicol-komulatif"
                                                class="form-control @error('distribusi_komulatif') is-invalid @enderror"
                                                placeholder="0.00" name="distribusi_komulatif" readonly>
                                            @error('distribusi_komulatif')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="multicol-tag_number">Tag Number</label>
                                            <input type="text" id="multicol-tag_number"
                                                class="form-control @error('tag_number') is-invalid @enderror"
                                                placeholder="Tag Number Otomatis..." name="tag_number" readonly>
                                            @error('tag_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3 d-flex justify-content-end">
                                            <div class="pt-4">
                                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                                <a href="{{ route('distribusi.index') }}"
                                                    class="btn btn-label-secondary">Cancel</a>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    function calculateProgress(selectedValue, jumlah, dataAwal) {
        let calculateDensitas = parseFloat(selectedValue / jumlah);
        let ProgresCalculate = dataAwal + calculateDensitas;
        return ProgresCalculate;
    }

    function kalkulasi(){
        let selectedValue = parseFloat(document.getElementById("permintaan").value);
        let jumlah = parseFloat("{{ $jumlah }}"); // Pastikan bahwa $jumlah adalah angka
        let dataAwal = parseFloat(document.getElementById("komulatif").value);

        let ProgresCalculate = calculateProgress(selectedValue, jumlah);
        ProgresCalculate = selectedValue / jumlah;

        let fixCalculate = dataAwal + ProgresCalculate;

        if(!dataAwal)  fixCalculate = 0;

        fixCalculate = fixCalculate.toFixed(2);

        document.getElementById("multicol-densitas").value = ProgresCalculate;

        let komulatif = document.getElementById("multicol-komulatif").value = fixCalculate == 0.00 ? ProgresCalculate : fixCalculate;

        let awalKomulatif = dataAwal ? dataAwal.toFixed(2) : '0.0';
        document.getElementById("multicol-tag_number").value = `${awalKomulatif} < R < ${komulatif}`
    }

    document.getElementById("permintaan").addEventListener("change", function() {
        kalkulasi();
    });

    document.getElementById("komulatif").addEventListener("change", function() {
        kalkulasi();
    });

</script>
@endpush

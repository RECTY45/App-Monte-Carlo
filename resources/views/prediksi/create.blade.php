@extends('layouts.main')
@section('content')
    <div class="container-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y my-5">
            <div class="card mb-4">
                <div class="card">
                    <h5 class="card-header">Tambah Data</h5>
                    <form class="card-body" method="POST" action="{{@route('prediksi.store')}}">
                        @csrf
                        <h6>Tambah Data Prediksi</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="multicol-nilai-random">Nilai Random</label>
                                <input type="text" id="multicol-random" class="form-control @error('nilai_random')is-invalid
                                @enderror"
                                    placeholder="0.00" name="nilai_random" readonly>
                                    @error('nilai_random')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="multicol-hasil-kali">*100</label>
                                <input type="text" id="multicol-hasil-kali" class="form-control @error('hasil_kali')is-invalid
                                @enderror"
                                    placeholder="menunggu nilai random..." name="hasil_kali" readonly>
                                    @error('hasil_kali')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="multicol-pesan-moring">*Jumlah Pesanan Moring</label>
                                <input type="text" id="multicol-pesan-moring" class="form-control @error('jumlah_pesan_moring')is-invalid
                                @enderror"
                                    placeholder="Masukkan Jumlah Pesan Moring" name="jumlah_pesan_moring">
                                    @error('jumlah_pesan_moring')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                            </div>
                            

                        </div>
                            <div class="pt-4">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <a href="{{route('distribusi.index')}}" class="btn btn-label-secondary">Cancel</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('script')
        <script>
  function calculateResult() {
        let randomInput = document.getElementById("multicol-random").value;
        let randomNumber = randomInput;

        if (!isNaN(randomNumber)) {
            let result = randomInput * 100;
            document.getElementById("multicol-hasil-kali").value = result;
        } else {
            document.getElementById("multicol-hasil-kali").value = "menunggu nilai random...";
        }
    }
    document.getElementById("multicol-random").addEventListener("input", calculateResult);
    document.getElementById("multicol-random").value=   Math.random(); // Menghasilkan angka desimal acak antara 1 dan jumlah dari permintaan
    calculateResult();
        </script>
    @endpush

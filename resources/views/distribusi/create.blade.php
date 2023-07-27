@extends('layouts.main')
@section('content')
    <div class="container-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y my-5">
            <div class="card mb-4">
                <div class="card">
                    <h5 class="card-header">Tambah Data</h5>
                    <form class="card-body" method="POST" action="{{ route('distribusi.store') }}">
                        @csrf
                        <h6>Tambah Data Distribusi</h6>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="multicol-permintaan">Permintaan/Hari</label>
                                <input type="text" id="multicol-permintaan" class="form-control @error('permintaan_hari')is-invalid
                                @enderror"
                                    placeholder="Masukkan Permintaan/Hari" name="permintaan_hari">
                                    @error('permintaan_hari')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="multicol-frekuensi">Frekuensi Permintaan</label>
                                <input type="text" id="multicol-frekuensi" class="form-control @error('frekuensi_permintaan')is-invalid
                                @enderror"
                                    placeholder="Masukkan Frekuensi Permintaan" name="frekuensi_permintaan">
                                    @error('frekuensi_permintaan')
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


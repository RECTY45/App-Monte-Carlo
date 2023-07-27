@extends('layouts.main')
@section('content')
    <div class="container-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-2 mb-2">Prediksi Monte Carlo</h4>
            @if (session()->has('success'))
                <div class="alert-success p-3 mb-4 rounded" id="alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show p-3 mb-4 " role="alert" id="error-alert">
                    {{ session('error') }}
                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif

             {{-- modal --}}
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi !!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       Silahkan isi data distribusi Permintaan terlebih dahulu...
                    </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                            @if ( ($count) > 0)
                            <a href="{{ route('prediksi.create') }}" class="btn btn-primary">Tambah</a>
                            @else
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah
                            </button>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Priode Permintaan Permintaan</th>
                                            <th>Nilai Random</th>
                                            <th>*100</th>
                                            <th>Jumlah Pesanan Moring</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $item)
                                            <tr align="center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top">
                                                    {{ $item->nilai_random }}
                                                </td>
                                                <td data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top">
                                                    {{ $item->hasil_kali }}
                                                    </ul>
                                                </td>
                                                <td data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top">
                                                    {{ $item->jumlah_pesan_moring }}
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <form action="{{ @route('prediksi.destroy', $item) }}"
                                                            method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit"
                                                                class=" btn btn-sm btn-danger mx-2 rounded-pill">
                                                                <i class="bx bx-trash me-1"></i>Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-5">Data Tidak Di Temukan</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

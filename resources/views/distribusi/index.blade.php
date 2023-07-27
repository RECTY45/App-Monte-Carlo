@extends('layouts.main')
@section('content')
<div class="container-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card-body">
            <h4 class="py-2 mb-3">Distribusi Monte Carlo</h4>
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show p-3" role="alert" id="alert-success">
                  {{session('success')}}
                  <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
              </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show p-3" role="alert" id="error-alert">
                {{ session('error') }}
                <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <h5 class="px-2 pt-3 mb-1"> Tabel Permintaan Monte Carlo</h5>
                        <div class="card-header d-flex justify-content-end">
                            <a href="{{ route('distribusi.create') }}" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Permintaan/Hari</th>
                                        <th>Frekuensi Permintaan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->permintaan_hari }}</td>
                                        <td>
                                            {{ $item->frekuensi_permintaan }}
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-sm btn-primary rounded-pill"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                                <form action="{{ route('distribusi.destroy', $item->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class=" btn btn-sm btn-danger mx-2 rounded-pill">
                                                        <i class="bx bx-trash me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </div>
                                    </tr>

                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5">Data Tidak Di Temukan</td>
                                    </tr>
                                    @endforelse
                                    <tr>
                                        <th>Jumlah : {{ $jumlah }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informasi !!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       Silahkan isi data di atas ini terlebih dahulu...
                    </div>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
            <div class="my-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="px-2 pt-3 mb-1"> Tabel Distribusi Monte Carlo</h5>
                            <div class="card-header d-flex justify-content-end">
                               @if (count($items) > 0)
                                <a href="{{ route('dcreate') }}" class="btn btn-primary">Tambah</a>
                               @else
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah
                                </button>
                               @endif
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Distribusi Dentitas</th>
                                            <th>Distribusi Komulatif</th>
                                            <th>Tag Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($itemsData as $data)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $data->distribusi_densitas }}
                                            </td>
                                            <td>
                                                {{ $data->distribusi_komulatif   }}
                                            </td>
                                            <td>
                                                {{ $data->tag_number }}
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{ route('ddestroy', $data->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class=" btn btn-sm btn-danger mx-2 rounded-pill">
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
</div>
@endsection
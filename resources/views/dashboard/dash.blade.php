@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary h3">Selamat Datang {{auth()->user()->name}} 🎉%</h5>
                            <p class="mb-4 h5">
                                Sambutan yang sangat hangat untuk Anda! Sangat menyenangkan melihat anda kembali!
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('img/illustrations/man-with-laptop-light.png') }}"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection
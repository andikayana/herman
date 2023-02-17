@extends('layouts.app-master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kunjungan Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Kunjungan pasien</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-4">
                    <!-- Input addon -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Diri Pasien</h3>
                        </div>
                        <div class="card-body">
                            @include('pasien_visitation._form')
                        </div>
                    </div>

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Kunjungan Pasien</h3>
                        </div>
                        <form method="POST" action="{{ url('pasien_visitation') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('pasien_visitation._form_create')
                            </div>
                        </form>
                    </div>

                </div>

                <!-- left column -->
                <div class="col-md-8">
                    <!-- Input addon -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Kunjungan pasien</h3>
                        </div>
                        <div class="card-body">
                            @include('pasien_visitation._form_riwayat')
                            {{-- <form method="POST" action="{{ url('pasien_visitation') }}" enctype="multipart/form-data">
                                @csrf

                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

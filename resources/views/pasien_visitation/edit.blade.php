@extends('layouts.app-master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pasien</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit pasien</li>
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
                            @include('pasien_visitation._form_data_diri')
                        </div>
                    </div>

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Update Kunjungan Pasien</h3>
                        </div>
                        <form method="POST" action="{{ url('pasien_visitation') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Tanggal Kunjungan</b></span>
                                            </div>
                                            <input type="text" class="form-control bg-white" name="pasien_id" hidden
                                                value="{{ $model->norm }}">
                                            <input class="form-control bg-white" type="datetime-local"
                                                name="tanggal_kunjungan" id="tanggal_kunjungan"
                                                value="{{ date('Y-m-d H:i') }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Sistolik</b></span>
                                            </div>
                                            <input type="text" class="form-control bg-white" name="sistolik"
                                                value="{{ $model_visitation->sistolik }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">mmHg</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Diastolik</b></span>
                                            </div>
                                            <input type="text" class="form-control bg-white" name="diastolik"
                                                value="{{ $model_visitation->diastolik }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">mmHg</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Suhu</b></span>
                                            </div>
                                            <input type="text" class="form-control bg-white" name="suhu"
                                                value="{{ $model_visitation->suhu }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">&deg;C</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Keluhan</b></span>
                                            </div>
                                            <textarea class="form-control bg-white" type="text" name="keluhan">{{ $model_visitation->keluhan }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Rencana Kerja</b></span>
                                            </div>
                                            <textarea class="form-control bg-white" type="text" name="rencana_kerja">{{ $model_visitation->rencana_kerja }}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><b>Diagnosa</b></span>
                                            </div>
                                            <input class="form-control bg-white" type="text" name="diagnosa"
                                                value="{{ $model_visitation->diagnosa }}">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button class="btn btn-info" type="submit" style="width: 100%">Simpan</button>
                                    </div>
                                </div>
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

@section('script')
    <script>
        $(document).ready(function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    text: 'Berhasil!!',
                })
            @endif
        });
    </script>
@endsection

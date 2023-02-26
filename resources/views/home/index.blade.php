@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <a href="{{ url('pasien_visitation/create') }}">
                    <div class="info-box mb-3 bg-info">
                        <span class="info-box-icon"><i class="fas fa-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tambah Kunjungan</span>
                            {{-- <span class="info-box-number">163,921</span> --}}
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <a href="{{ url('pasien/create') }}">
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fas fa-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tambah Pasien</span>
                        {{-- <span class="info-box-number">163,921</span> --}}
                    </div>
                </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 bg-purple">
                    <span class="info-box-icon"><i class="fas fa-chart-bar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Kunjungan Bulan Ini</span>
                        <span class="info-box-number">{{ $jml_kunjungan }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pasien</span>
                        <span class="info-box-number">{{ $jml_pasien }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

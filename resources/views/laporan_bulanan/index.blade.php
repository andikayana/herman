@extends('layouts.app-master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Laporan Kunjungan Pasien</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Kunjungan pasien</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">DataTable with default features</h3> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="GET" action="{{ route('pasien_visitation.index') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><b>Tanggal kunjungan</b></span>
                                                    </div>
                                                    <input class="form-control" name="tanggal_mulai" type="date" value="{{ \Carbon\Carbon::parse($start_date)->format('Y-m-d') }}">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><b>S/D</b></span>
                                                    </div>
                                                    <input class="form-control" name="tanggal_selesai" type="date" value="{{ \Carbon\Carbon::parse($end_date)->format('Y-m-d') }}">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <button class="btn btn-primary btn-block" type="submit"><i
                                                    class="fa fa-search"></i>&ensp;Cari Kunjungan</button>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <a href="" class="btn btn-success btn-block"><i
                                                    class="fa fa-file-excel"></i>&ensp;Export Excel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabelData" name="tabelData" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">No RM</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir & Alamat</th>
                                        <th class="text-center">Tekanan</br>Darah</th>
                                        <th class="text-center">Suhu</th>
                                        <th class="text-center">Diagnosa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center text-bold">{{ $value->pasien_id }}
                                                </br>
                                                <small class="text-danger">{{ $value->tanggal_kunjungan ? \Carbon\Carbon::parse($value->tanggal_kunjungan)->format('d-m-Y') : '' }}</small>
                                            </td>
                                            <td>{{ $value->nama }}
                                                </br>
                                                <small class="text-primary">{{ $value->jenis_kelamin }}</small>
                                            </td>
                                            <td>{{ $value->tanggal_lahir ? \Carbon\Carbon::parse($value->tanggal_lahir)->format('d-m-Y') : '' }}
                                                </br> {{ $value->alamat }}</td>
                                            <td class="text-center">{{ $value->sistolik }}/{{ $value->diastolik }} mmHg</td>
                                            <td class="text-center">{{ $value->suhu }} &deg;C</td>
                                            <td class="text-center">{{ $value->diagnosa }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $("#tabelData").DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

@extends('layouts.app-master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Data User Pengguna</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ url('user/create') }}" class="btn btn-info btn-block"><i
                                class="fa fa-plus"></i>&ensp;Tambah User</a>
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
                        {{-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> --}}
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabelData" name="tabelData" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th class="text-center">Update</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->username }}</td>
                                            <td>{{ $value->role_name }}</td>
                                            <td class="text-center">
                                                    <a href="{{ url('user/' . $value->id . '/edit') }}"
                                                        class="btn btn-warning btn-block btn-sm"><i
                                                            class="fa fa-pen"></i>&ensp;Update
                                                    </a>
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ url('pasien/' . $value->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button style="width: 100%"
                                                        class="btn btn-danger delete btn-block btn-sm" type="submit"
                                                        data-toggle="tooltip" data-id='{{ $value->id }}'
                                                        data-nama='{{ $value->nama }}'><i
                                                            class="fa fa-trash"></i>&ensp;Delete</button>
                                                </form>
                                            </td>
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
        $('.delete').click(function() {
            var nama = $(this).attr('data-nama');
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: 'Kamu Yakin?',
                text: "Hapus data '" + nama + "'",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                confirmButtonColor: '#3085d6',
                cancelButtonText: 'Cancel!',
                cancelButtonColor: '#d33',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Berhasil Dihapus.'
                    });
                }
            })
        })
    </script>
@endsection

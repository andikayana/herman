<div class="row">
    <div class="form-group col-md-12">
        <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('pasien_visitation.search') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><b>No. Rekam Medis</b></span>
                        </div>
                        <input class="form-control" type="text" name="norm" id="norm"
                           required pattern=".{6,}" oninvalid="this.setCustomValidity('Panjang RM 6 digit!!')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" placeholder="000000" maxlength="6" value="{{ $model->norm }}">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-md-auto">
                <div class="input-group">
                    <a class="btn btn-danger" data-toggle="modal" data-target="#form-cari">Cari</a>
                </div>
            </div>
        </div>

    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama</b></span>
            </div>
            <input type="text" class="form-control bg-white" name="nama" value="{!! $model->nama !!}" disabled>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Jenis Kemamin</b></span>
            </div>
            <input type="text" class="form-control bg-white" name="jenis_kelamin" value="{{ $model->jenis_kelamin }}"
                disabled>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Alamat</b></span>
            </div>
            <input class="form-control bg-white" type="text" name="alamat" value="{{ $model->alamat }}" disabled>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group date">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Tanggal Lahir </b></span>
            </div>
            <input class="form-control bg-white" data-target="#tanggal_lahir" type="date" name="tanggal_lahir"
                id="tanggal_lahir" disabled
                value="{{ $model->tanggal_lahir ? \Carbon\Carbon::parse($model->tanggal_lahir)->format('Y-m-d') : '' }}">
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Keterangan</b></span>
            </div>
            <textarea class="form-control bg-white" type="text" name="keterangan" disabled>{{ $model->keterangan }}</textarea>
        </div>
    </div>

</div>

<div class="modal fade" id="form-cari" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pencari Px Berdasarkan Nama</h5>
                <a href="{{ url('pasien/create') }}" class="btn btn-primary">Tambah Pasien</a>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>

            <div class="modal-body">
                {{-- <input type="hidden" name="riwayat_id" id="riwayat_id"> --}}
                <div class="col-md-12">
                    <table id="tabelModal" name="tabelModal" class="table">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">No RM</th>
                                <th>Nama</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center text-bold">{{ $value->norm }}</td>
                                    <td>{{ $value->nama }}</td>
                                    <td class="text-center">{{ $value->jenis_kelamin }}</td>
                                    <td class="text-center">{{ $value->tanggal_lahir ? \Carbon\Carbon::parse($value->tanggal_lahir)->format('d-m-Y') : '' }}</td>
                                    <td>{{ $value->alamat }}</td>
                                    <td>{{ $value->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @section('script')
    <script>
        $(document).ready(function() {
            $('.btn-edit').click(function() {
                let data_id = $(this).attr('data-id');
                let data_nama_pendidikan = $(this).attr('data-nama_pendidikan');
                let data_periode_pendidikan = $(this).attr('data-periode_pendidikan');
                $('#riwayat_id').val(data_id);
                $('#nama_pendidikan').val(data_nama_pendidikan);
                $('#periode_pendidikan').val(data_periode_pendidikan);
                $('#form-riwayat').modal('show');
            })
        });
    </script>
@endsection --}}

@section('script')
    <script>
        $(document).ready(function() {
            @if (session('fail'))
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('fail') }}',
                    text: 'GAGAL!!',
                })
            @endif

            $("#tabelModal").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

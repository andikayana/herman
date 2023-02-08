<div class="row">
    <div class="form-group col-md-12">
        <div class="row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>No. Rekam Medis</b></span>
                    </div>
                    <input class="form-control" type="number" name="norm" value="{{ $model->norm }}" required maxlength="6">
                    <span class="input-group-append">
                        <button type="button" class="btn btn-info"><i class="fas fa-search"></i></button>
                    </span>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="input-group">
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#form-cari">Cari</a>
                </div>
            </div>
        </div>

    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama</b></span>
            </div>
            <input type="text" class="form-control bg-white" name="nama" value="{{ $model->nama }}" disabled>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Jenis Kemamin</b></span>
            </div>
            <input type="text" class="form-control bg-white" name="jenis_kelamin" value="{{ $model->jenis_kelamin }}" disabled>
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

    <div class="form-group col-md-12">
        <button class="btn btn-info" type="submit" style="width: 100%">Simpan</button>
    </div>
</div>

<div class="modal fade" id="form-cari" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ url('pegawai/' . $model->id . '/riwayat') }}" enctype="multipart/form-data">
            @csrf
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
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><b>Nama</b></span>
                                        </div>
                                        <input class="form-control" type="text" name="nama_pendidikan" id="nama_pendidikan">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-auto">
                                <div class="input-group">
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-cari">Cari Pasien</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div> --}}
            </div>
        </form>
    </div>
</div>

@section('script')
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
@endsection

{{-- @section('script')
    <script>
        $(document).ready(function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Pasien Berhasil Ditambahkan!!',
                    text: '{{ session('success') }}',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/student-management/student/" + id
                    }
                })
            @elseif (session('success-edit'))
                Swal.fire({
                    title: 'Good job!',
                    text: '{{ session('success-edit') }}',
                    icon: 'success'
                })
            @endif
        });
    </script>
@endsection --}}

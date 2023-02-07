<div class="row">

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>No. Rekam Medis</b></span>
            </div>
            <input class="form-control" type="text" name="norm" value="{{ $model->norm }}" disabled>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama</b></span>
            </div>
            <input type="text" class="form-control" name="nama" value="{{ $model->nama }}" required>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Jenis Kemamin</b></span>
            </div>
            <select class="form-control select2" name="jenis_kelamin" required>
                <option {{ $model->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }} value="Laki-laki">Laki-laki
                </option>
                <option {{ $model->jenis_kelamin === 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan
                </option>
            </select>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Alamat</b></span>
            </div>
            <input class="form-control" type="text" name="alamat" value="{{ $model->alamat }}" required>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group date">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Tanggal Lahir </b></span>
            </div>
            <input class="form-control" data-target="#tanggal_lahir" type="date" name="tanggal_lahir"
                id="tanggal_lahir"
                value="{{ $model->tanggal_lahir ? \Carbon\Carbon::parse($model->tanggal_lahir)->format('Y-m-d') : '' }}">
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Keterangan</b></span>
            </div>
            <textarea class="form-control" type="text" name="keterangan">{{ $model->keterangan }}</textarea>
        </div>
    </div>

    <div class="form-group col-md-12">
        <button class="btn btn-info" type="submit" style="width: 100%">Simpan</button>
    </div>
</div>

@section('script')
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
@endsection

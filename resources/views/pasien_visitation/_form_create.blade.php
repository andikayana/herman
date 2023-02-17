<div class="row">
    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Tanggal Kunjungan</b></span>
            </div>
            <input type="text" class="form-control bg-white" name="pasien_id" hidden value="{{ $model->norm }}">
            <input class="form-control bg-white" type="date" name="tanggal_kunjungan"
                id="tanggal_kunjungan" value="{{ date("Y-m-d") }}">
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Sistolik</b></span>
            </div>
            <input type="text" class="form-control bg-white" name="sistolik" {{-- value="{!! $model_visitation_visitation->sistolik !!}" --}}>
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
            <input type="text" class="form-control bg-white" name="diastolik" {{-- value="{{ $model_visitation->diastolik }}" --}}>
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
            <input type="text" class="form-control bg-white" name="suhu" {{-- value="{{ $model_visitation->diastolik }}" --}}>
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
            <textarea class="form-control bg-white" type="text" name="keluhan"></textarea>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Rencana Kerja</b></span>
            </div>
            <textarea class="form-control bg-white" type="text" name="rencana_kerja"></textarea>
        </div>
    </div>


    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Diagnosa</b></span>
            </div>
            <input class="form-control bg-white" type="text" name="diagnosa" {{-- value="{{ $model_visitation->alamat }}" --}}>
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
                    icon: 'success',
                    title: '{{ session('success') }}',
                    text: 'Berhasil!!',
                })
            @endif
        });
    </script>
@endsection

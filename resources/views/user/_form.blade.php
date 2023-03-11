<div class="row">
    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Nama</b></span>
            </div>
            <input class="form-control" type="text" name="name" value="{{ $model->name }}" required>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Username</b></span>
            </div>
            <input type="text" class="form-control" name="username" value="{{ $model->username }}" required>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Password</b></span>
            </div>
            <input type="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Confirm Password</b></span>
            </div>
            <input type="password" class="form-control" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>Role User</b></span>
            </div>
            <select class="form-control select2" name="role" id="role" required>
                <option>- Pilih -</option>
                <option {{ $model->role == 2 ? 'selected' : '' }} value="2">Dokter
                </option>
                <option {{ $model->role == 3 ? 'selected' : '' }} value="3">Perawat
                </option>
            </select>
        </div>

        <div class="input-group">
            <input class="form-control" type="hidden" id="role_name" name="role_name">
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
                    title: 'Berhasil!!',
                    text: '{{ session('success') }}',
                    icon: 'success'
                })
            @elseif (session('success-edit'))
                Swal.fire({
                    title: 'Good job!',
                    text: '{{ session('success-edit') }}',
                    icon: 'success'
                })
            @endif

            var role_selected = $('#role').find(":selected").val();
            if (role_selected == 2) {
                document.getElementById("role_name").value = 'Dokter';
            } else if (role_selected == 3) {
                document.getElementById("role_name").value = 'Perawat';
            };

            $('#role').on('change', '', function(e) {
                role_selected = document.getElementById("role").value;
                if (role_selected == 2) {
                    document.getElementById("role_name").value = 'Dokter';
                } else if (role_selected == 3) {
                    document.getElementById("role_name").value = 'Perawat';
                };
            });
        });
    </script>
@endsection

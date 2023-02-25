<div class="row">
    <table id="tabelData" name="tabelData" class="table">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Tanggal Kunjungan</th>
                <th class="text-center">Sistolik</th>
                <th class="text-center">Diastolik</th>
                <th class="text-center">Suhu</th>
                <th>Keluhan</th>
                <th>Rencana Kerja</th>
                <th>Diagnosa</th>
                {{-- <th class="text-center">Update</th>
                <th class="text-center">Delete</th> --}}
            </tr>
        </thead>
        <tbody>
            @if($riwayat != null)
                @foreach ($riwayat as $key => $value)
                    <tr>
                        <td class="text-center"><b>{{ $key + 1 }}</b></td>
                        <td class="text-center">{{ $value->tanggal_kunjungan ? \Carbon\Carbon::parse($value->tanggal_kunjungan)->format('d-m-Y') : '' }}</td>
                        <td class="text-center">{{ $value->sistolik }}</td>
                        <td class="text-center">{{ $value->diastolik }}</td>
                        <td class="text-center">{{ $value->suhu }}</td>
                        <td>{{ $value->keluhan }}</td>
                        <td>{{ $value->rencana_kerja }}</td>
                        <td>{{ $value->diagnosa }}</td>
                        {{-- <td class="text-center">
                            <div class="row">
                                <a href="{{ url('pasien/' . $value->id . '/edit') }}"
                                    class="btn btn-warning btn-block btn-sm"><i class="fa fa-pen"></i>&ensp;Update
                                </a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="row">
                                <form action="{{ url('pasien/' . $value->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger delete btn-block btn-sm" type="submit"
                                        data-toggle="tooltip" data-id='{{ $value->id }}'
                                        data-nama='{{ $value->nama }}'><i
                                            class="fa fa-trash"></i>&ensp;Delete</button>
                                </form>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@section('script')
    <script>
        $(document).ready(function() {
            $("#tabelData").DataTable({
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


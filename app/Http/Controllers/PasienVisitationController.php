<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Models\PasienVisitation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PasienVisitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->tanggal_mulai || request()->tanggal_selesai) {
            $start_date = Carbon::createFromFormat('Y-m-d', request()->tanggal_mulai)->toDateString();
            $end_date = Carbon::createFromFormat('Y-m-d', request()->tanggal_selesai)->toDateString();
            //dd($data);
            $data = PasienVisitation::join('pasien', 'pasien.norm', '=', 'pasien_visitation.pasien_id')
                ->whereDate('pasien_visitation.tanggal_kunjungan', '>=', $start_date)
                ->whereDate('pasien_visitation.tanggal_kunjungan', '<=', $end_date)
                ->orderBy('pasien_visitation.id', 'ASC')
                ->select('pasien_visitation.id AS visitation_id', 'pasien_visitation.pasien_id', 'pasien_visitation.tanggal_kunjungan', 'pasien_visitation.sistolik', 'pasien_visitation.diastolik', 'pasien_visitation.suhu', 'pasien_visitation.diagnosa', 'pasien.*')
                ->get();
            return view('pasien_visitation.index', compact(
                'data',
                'start_date',
                'end_date'
            ));
        } else {
            $start_date = Carbon::parse(Carbon::now())->toDateString();
            $end_date = Carbon::parse(Carbon::now())->toDateString();
            $data = PasienVisitation::join('pasien', 'pasien.norm', '=', 'pasien_visitation.pasien_id')
                ->whereDate('pasien_visitation.tanggal_kunjungan', '=', $start_date)
                ->select('pasien_visitation.id AS visitation_id', 'pasien_visitation.pasien_id', 'pasien_visitation.tanggal_kunjungan', 'pasien_visitation.sistolik', 'pasien_visitation.diastolik', 'pasien_visitation.suhu', 'pasien_visitation.diagnosa', 'pasien.*')
                ->orderBy('visitation_id', 'ASC')
                ->get();
            //dd($data);
            return view('pasien_visitation.index', compact(
                'data',
                'start_date',
                'end_date'
            ));
        }
    }

    public function search(Request $request)
    {
        $model = Pasien::find($request->norm);
        $model_visitation = new PasienVisitation();
        if ($model) {
            $data = Pasien::orderBy('id', 'DESC')->get();
            $riwayat = PasienVisitation::where('pasien_id', '=', $request->norm)->get();
            return view('pasien_visitation.create')
            ->with('model', $model)
            ->with('riwayat', $riwayat)
            ->with('data', $data)
            ->with('model_visitation', $model_visitation);
        } else {
            return Redirect::to('pasien_visitation/create')->with('fail', 'No. RM tidak Terdaftar');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new PasienVisitation();
        $model_visitation = new PasienVisitation();
        $data = Pasien::orderBy('id', 'DESC')->get();
        $riwayat = null;
        // $model_visitation ='';
        return view('pasien_visitation.create', compact(
            'model',
            'data',
            'model_visitation'
        ))->with('riwayat', $riwayat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new PasienVisitation();
        $model->pasien_id = $request->pasien_id;
        $model->tanggal_kunjungan = $request->tanggal_kunjungan;
        $model->sistolik = $request->sistolik;
        $model->diastolik = $request->diastolik;
        $model->suhu = $request->suhu;
        $model->keluhan = $request->keluhan;
        $model->rencana_kerja = $request->rencana_kerja;
        $model->diagnosa = $request->diagnosa;
        $model->dokter_id = auth()->user()->id;
        $model->save();
        //dd($new_id);
        return Redirect::to('pasien_visitation/create')->with('success', 'Berhasil menambahkan kunjungan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PasienVisitation  $pasienVisitation
     * @return \Illuminate\Http\Response
     */
    public function show(PasienVisitation $pasienVisitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PasienVisitation  $pasienVisitation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model_visitation = PasienVisitation::find($id);
        $model = Pasien::where('norm', '=', $model_visitation->pasien_id)->first();
        //dd($model_visitation->pasien_id);
        $data = Pasien::orderBy('id', 'DESC')->get();
        $riwayat = PasienVisitation::where('pasien_id', '=', $model_visitation->pasien_id)->get();
        //dd($model_visitation);
        return view('pasien_visitation.create')
        ->with('model_visitation', $model_visitation)
        ->with('success', 'Ingin menambahkan kunjungan?')
        ->with('model', $model)
        ->with('riwayat', $riwayat)
        ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PasienVisitation  $pasienVisitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasienVisitation $pasienVisitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PasienVisitation  $pasienVisitation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = PasienVisitation::find($id);
        $model->delete();
        return redirect('pasien_visitation')->with('success', 'Pasien berhasil dihapus');
    }

    public function laporan_bulanan(Request $request)
    {
        if (request()->tanggal_mulai || request()->tanggal_selesai) {
            $start_date = Carbon::createFromFormat('Y-m-d', request()->tanggal_mulai)->toDateString();
            $end_date = Carbon::createFromFormat('Y-m-d', request()->tanggal_selesai)->toDateString();
            //dd($data);
            $data = PasienVisitation::join('pasien', 'pasien.norm', '=', 'pasien_visitation.pasien_id')
                ->whereDate('pasien_visitation.tanggal_kunjungan', '>=', $start_date)
                ->whereDate('pasien_visitation.tanggal_kunjungan', '<=', $end_date)
                ->orderBy('pasien_visitation.id', 'ASC')
                ->select('pasien_visitation.id AS visitation_id', 'pasien_visitation.pasien_id', 'pasien_visitation.tanggal_kunjungan', 'pasien_visitation.sistolik', 'pasien_visitation.diastolik', 'pasien_visitation.suhu', 'pasien_visitation.diagnosa', 'pasien.*')
                ->get();
            return view('laporan_bulanan.index', compact(
                'data',
                'start_date',
                'end_date'
            ));
        } else {
            $start_date = Carbon::parse(Carbon::now())->toDateString();
            $end_date = Carbon::parse(Carbon::now())->toDateString();
            $data = PasienVisitation::join('pasien', 'pasien.norm', '=', 'pasien_visitation.pasien_id')
                ->whereDate('pasien_visitation.tanggal_kunjungan', '=', $start_date)
                ->select('pasien_visitation.id AS visitation_id', 'pasien_visitation.pasien_id', 'pasien_visitation.tanggal_kunjungan', 'pasien_visitation.sistolik', 'pasien_visitation.diastolik', 'pasien_visitation.suhu', 'pasien_visitation.diagnosa', 'pasien.*')
                ->orderBy('visitation_id', 'ASC')
                ->get();
            //dd($data);
            return view('laporan_bulanan.index', compact(
                'data',
                'start_date',
                'end_date'
            ));
        }
    }
}

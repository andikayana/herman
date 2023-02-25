<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pasien::orderBy('id', 'DESC')->get();
        return view('Pasien.index', compact(
            'data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Pasien();
        return view('pasien.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Pasien;
        $model->nama = $request->nama;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->alamat = $request->alamat;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->keterangan = $request->keterangan;
        $model->save();
        $new_id = $model->id;
        //dd($new_id);
        return redirect('pasien/'.$new_id.'/edit')->with('success', 'Ingin menambahkan kunjungan?')->with('id', $new_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Pasien::find($id);
        return view('pasien.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Pasien::find($id);
        $model->nama = $request->nama;
        $model->jenis_kelamin = $request->jenis_kelamin;
        $model->alamat = $request->alamat;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->keterangan = $request->keterangan;
        $model->save();
        $new_id = $model->id;
        return redirect('pasien/'.$new_id.'/edit')->with('success-edit', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = pasien::find($id);
        $model->delete();
        return redirect('pasien')->with('success', 'Pasien berhasil dihapus');
    }
}

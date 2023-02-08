<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\PasienVisitation;
use Illuminate\Http\Request;

class PasienVisitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PasienVisitation::orderBy('id', 'ASC')->get();
        return view('pasien_visitation.index', compact(
            'data'
        ));
    }

    public function search(Request $request)
    {
        if ($request->has('nama')) {
            return Pasien::where('nama', 'like', '%' . $nama . '%')->get();
        }

        return response([]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new PasienVisitation();
        return view('pasien_visitation.create', compact(
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
        //
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
    public function edit(PasienVisitation $pasienVisitation)
    {
        //
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
    public function destroy(PasienVisitation $pasienVisitation)
    {
        //
    }
}

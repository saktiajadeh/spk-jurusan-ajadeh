<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kriteria;
use App\User;

class KriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $kriteria = kriteria::where('id_user', $user->id)->get();
        return view('kriteria.index', compact('kriteria', $kriteria));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kriteria = kriteria::where('id_user', $id)->get();
        return view('kriteria.show', compact('kriteria', $kriteria));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = kriteria::where('id_user', $id)->get();
        foreach ($kriteria as $key => $value) {
            $valInputRangeArr = [4, 3, 2, 1, 0, -1, -2, -3, -4];
            $valOriArr = [9.0000, 7.0000, 5.0000, 3.0000, 1.0000, 0.3333, 0.2, 0.1428, 0.1111];
            $findIndex = array_search($value->bobot_utama, $valOriArr);
            if ($findIndex != -1 && $findIndex != false) {
                $parseValueBobotUtama = $valInputRangeArr[$findIndex];
                $value->bobot_utama = $parseValueBobotUtama;
            }
        }
        return view('kriteria.edit', compact('kriteria', $kriteria));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // session()->flash('status-ahp', 'Hasil Consistency Ratio:(0.09), Checker AHP : Consistency Ratio Harus < 0.1, silahkan lakukan pembobotan kriteria kembali :)');
        // session()->forget('status-ahp');
        return redirect()->route('kriteria.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

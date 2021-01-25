<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\kriteria;
use App\alternatif;
use App\bobot_alternatif;

class AlternatifController extends Controller
{
    public function findRank($kriteria, $alternatif, $bobot_alternatif)
    {
        $bobot_alternatifE = [];
        $normalisasi = [];
        $ahpSaw = [];
        foreach ($alternatif as $key => $value) {
            foreach ($bobot_alternatif as $keyB => $valueB) {
                if ($value->id == $valueB->id_alternatif) {
                    $bobot_alternatifE[$key][] = $valueB;
                    $normalisasi[$key][] = $valueB->bobot;
                    $ahpSaw[$key][] = $valueB->bobot;
                }
            }
        }
        $minSaw = [];
        $maxSaw = [];
        foreach ($kriteria as $key => $value) {
            $minSaw[] = 101;
            $maxSaw[] = 0;
            foreach ($bobot_alternatif as $keyAlt => $valueAlt) {
                if ($value->id == $valueAlt->id_kriteria) {
                    if ($valueAlt->bobot < $minSaw[$key]) {
                        $minSaw[$key] = $valueAlt->bobot;
                    }
                    if ($valueAlt->bobot > $maxSaw[$key]) {
                        $maxSaw[$key] = $valueAlt->bobot;
                    }
                }
            }
        }
        $dataFindCR = app('App\Http\Controllers\KriteriaController')->consistencyRatioKriteria($kriteria);
        foreach ($bobot_alternatifE as $keyN => $valueN) {
            foreach ($kriteria as $key => $value) {
                if ($value->id == $valueN[$key]->id_kriteria) {
                    $normalisasi[$keyN][$key] = round($valueN[$key]->bobot / $maxSaw[$key],4);
                    // dd($dataFindCR['eigenVector'][$key]);
                    $ahpSaw[$keyN][$key] = ($valueN[$key]->bobot / $maxSaw[$key]) * $dataFindCR['eigenVector'][$key];
                }
            }
        }
        $ranking = [];
        foreach ($alternatif as $key => $value) {
            $ranking[] = 0;
            foreach ($ahpSaw as $keyAhpSaw => $valueAhpSaw) {
                if($key == $keyAhpSaw){
                    $newVal = 0;
                    foreach ($valueAhpSaw as $valueAhpSaw => $valueAAA) {
                        $newVal = $newVal + $valueAAA;
                    }
                    $ranking[$key] = $newVal;
                }
            }
        }
        $data = [
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'bobot_alternatif' => $bobot_alternatifE,
            'minSaw' => $minSaw,
            'maxSaw' => $maxSaw,
            'normalisasi' => $normalisasi,
            'ahpSaw' => $ahpSaw,
            'ranking' => $ranking,
            'dataFindCR' => $dataFindCR,
        ];
        return $data;
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
        $alternatif = alternatif::where('id_user', $user->id)->get();
        $bobot_alternatif = bobot_alternatif::where('id_user', $user->id)->get();
        $bobot_alternatifE = [];
        foreach ($alternatif as $key => $value) {
            foreach ($bobot_alternatif as $keyB => $valueB) {
                if($value->id == $valueB->id_alternatif){
                    $bobot_alternatifE[$key][] = $valueB;
                }
            }
        }
        $data = [
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'bobot_alternatif' => $bobot_alternatifE,
        ];
        return view('alternatif.index', ['data' => $data]);
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
        $user = auth()->user();
        $kriteria = kriteria::where('id_user', $user->id)->get();
        $alternatif = alternatif::where('id_user', $user->id)->get();
        $bobot_alternatif = bobot_alternatif::where('id_user', $user->id)->get();
        $dataFindRank = $this->findRank($kriteria, $alternatif, $bobot_alternatif);
        $data = [
            'dataFindRank' => $dataFindRank,
        ];
        return view('alternatif.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $kriteria = kriteria::where('id_user', $user->id)->get();
        $alternatif = alternatif::where('id_user', $id)->get();
        $bobot_alternatif = bobot_alternatif::where('id_user', $user->id)->get();
        $bobot_alternatifE = [];
        foreach ($alternatif as $key => $value) {
            foreach ($bobot_alternatif as $keyB => $valueB) {
                if ($value->id == $valueB->id_alternatif) {
                    $bobot_alternatifE[$key][] = $valueB;
                }
            }
        }
        $data = [
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'bobot_alternatif' => $bobot_alternatifE
        ];
        return view('alternatif.edit', ['data' => $data]);
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
        $bobot_alternatif = bobot_alternatif::where('id_user', $id)->get();
        foreach ($bobot_alternatif as $key => $value) {
            $newData = [];
            $newData['bobot_utama'] = $request["bobot_" . $value->id];
            bobot_alternatif::where('id', $value->id)
                ->update([
                    'bobot' => $newData['bobot_utama'],
                ]);
        }
        session()->flash('update-alternatif', 'Berhasil Update Data Bobot Alternatif Jurusan');
        return redirect()->route('alternatif.show', $id);
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

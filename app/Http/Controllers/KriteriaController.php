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
    public function consistencyRatioKriteria($paramK)
    {
        $kriteria = $paramK;
        $matriks = [];
        $sumMatriks = [0, 0, 0];
        foreach ($kriteria as $key => $value) {
            foreach ($kriteria as $keysub => $valuesub) {
                //set matriks arr
                $newVal = 0;
                $matriks[$key][$keysub] = "";
                if ($key != $keysub) {
                    if ($key == 0 && $keysub == 1) {
                        $newVal = floatval($valuesub->bobot_utama);
                    }
                    if ($key == 0 && $keysub == 2) {
                        $newVal = floatval($valuesub->bobot_utama);
                    }
                    if ($key == 1 && $keysub == 0) {
                        $newVal = floatval($valuesub->sub_kriteria->persen_bobot_sub);
                    }
                    if ($key == 1 && $keysub == 2) {
                        $newVal = floatval($valuesub->sub_kriteria->bobot_utama);
                    }
                    if ($key == 2 && $keysub == 0) {
                        $newVal = floatval($valuesub->sub_kriteria->sub_kriteria->persen_bobot_sub);
                    }
                    if ($key == 2 && $keysub == 1) {
                        $newVal = floatval($valuesub->sub_kriteria->sub_kriteria->persen_bobot_sub);
                    }
                } else {
                    $newVal = 1;
                }
                $matriks[$key][$keysub] = $newVal;

                //set sum matriks arr
                $sumMatriks[$keysub] = $sumMatriks[$keysub] + $matriks[$key][$keysub];
            }
        }

        $normalisasi = [];
        $sumNormalisasi = [0, 0, 0];
        foreach ($kriteria as $key => $value) {
            foreach ($kriteria as $keysub => $valuesub) {
                //set normalisasi arr
                $normalisasi[$key][$keysub] = "";
                $newVal = $matriks[$key][$keysub] / $sumMatriks[$keysub];
                $normalisasi[$key][$keysub] = round($newVal, 4);

                //set sum normalisasi arr
                $sumNormalisasi[$keysub] = $sumNormalisasi[$keysub] + $newVal;
            }
        }
        $eigenVector = [0, 0, 0];
        $principalEigenValue = 0;
        $nTotal = count($kriteria);
        $randomIndex = 0.58;
        $consistencyIndex = 0;
        $consistencyRatio = 0;
        foreach ($kriteria as $key => $value) {
            foreach ($kriteria as $keysub => $valuesub) {
                $eigenVector[$key] = $eigenVector[$key] + $normalisasi[$key][$keysub];
            }
        }
        foreach ($eigenVector as $key => $value) {
            $eigenVector[$key] = $value / $nTotal;
            $principalEigenValue = $principalEigenValue + ($sumMatriks[$key] * $eigenVector[$key]);
        }
        $principalEigenValue = round($principalEigenValue, 2);
        $consistencyIndex = round(number_format(($principalEigenValue - $nTotal), 9), 4) / ($nTotal - 1);
        $consistencyRatio = $consistencyIndex / $randomIndex;
        $data = [
            'matriks' => $matriks,
            'sumMatriks' => $sumMatriks,
            'normalisasi' => $normalisasi,
            'sumNormalisasi' => $sumNormalisasi,
            'eigenVector' => $eigenVector,
            'principalEigenValue' => $principalEigenValue,
            'nTotal' => $nTotal,
            'randomIndex' => $randomIndex,
            'consistencyIndex' => $consistencyIndex,
            'consistencyRatio' => $consistencyRatio,
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
        $dataFindCR = $this->consistencyRatioKriteria($kriteria);
        
        if($dataFindCR['consistencyRatio'] < 0.1){
            session()->flash('cr-passed', 'Consistency Ratio Terpenuhi! Silahkan Lanjut ke Analisis Alternatif Jurusan');
        }
        return view('kriteria.show', compact('kriteria', $kriteria, 'dataFindCR', $dataFindCR));
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
            $valInputRangeArr = [
                4, 3, 2, 1, 0, -1, -2, -3, -4
            ];
            $valOriArr = [
                9.0000, 7.0000, 5.0000, 3.0000, 1.0000, 0.3333, 0.2, 0.1428, 0.1111
            ];
            $findIndex = array_search($value->bobot_utama, $valOriArr);
            $parseValueBobotUtama = $valInputRangeArr[$findIndex];
            $value->bobot_utama = $parseValueBobotUtama;
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
        $kriteria = kriteria::where('id_user', $id)->get();
        foreach ($kriteria as $key => $value) {
            $valInputRangeArr = [
                4, 3, 2, 1, 0, -1, -2, -3, -4
            ];
            $valOriArr = [
                9.0000, 7.0000, 5.0000, 3.0000, 1.0000, 0.3333, 0.2, 0.1428, 0.1111
            ];
            $findIndexUtama = array_search(intval($request["bobot_utama_" . $value->id]), $valInputRangeArr);
            $findIndexSub = array_search(- (intval($request["bobot_utama_" . $value->id])), $valInputRangeArr);
            $newData = [];
            $newData['bobot_utama'] = $valOriArr[$findIndexUtama];
            $newData['persen_bobot_sub'] = $valOriArr[$findIndexSub];
            kriteria::where('id', $value->id)
            ->update([
                'bobot_utama' => $newData['bobot_utama'],
                'persen_bobot_sub' => $newData['persen_bobot_sub'],
            ]);
        }
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

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h4 style="margin: 0;">Pembobotan Kriteria</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if($kriteria->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Kriteria Masih Kosong</h1>
                        </div>
                    @else
                        <form method="POST" action="{{ route("kriteria.update", auth()->user()->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT"/>
                            @foreach ( $kriteria as $i => $dataKriteria )
                                <div style="display: flex;justify-content: space-between; margin-bottom: 20px;">
                                    <p style="min-width: 65px;">{{ $dataKriteria->name }}</p>
                                    <div style="width: 100%; padding: 0 20px; padding-top: 8px;">
                                        <input name="{{ "bobot_utama_".$dataKriteria->id }}" class="slider-bar" id="{{ "bobot_utama_".$dataKriteria->id }}" type="range" min="-4" max="4" value="{{ $dataKriteria->bobot_utama }}" step="1" oninput="{{ 'output_'.$dataKriteria->id }}.value = {{ 'bobot_utama_'.$dataKriteria->id }}.value;" style="transform: scale(-1, 1);"/>
                                        <div style="display: flex;align-items: center;justify-content: space-between;">
                                            <output id="{{ "output_".$dataKriteria->id }}" class="output">{{ $dataKriteria->bobot_utama }}</output>
                                        </div>
                                    </div>
                                    <p style="min-width: 65px;">{{ $dataKriteria->sub_kriteria->name }}</p>
                                </div>
                            @endforeach
                        <div class="text-right" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h4 style="margin: 0;">Informasi Bobot</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover" style="margin: 0;">
                        <tbody>
                            <tr style="background-color: #3097d1 !important;color: white !important;">
                                <td colspan="9">Konversi :</td>
                            </tr>
                            <tr>
                                <td width="11%" align="center" style="vertical-align: middle;">4</td>
                                <td width="11%" align="center" style="vertical-align: middle;">3</td>
                                <td width="11%" align="center" style="vertical-align: middle;">2</td>
                                <td width="11%" align="center" style="vertical-align: middle;">1</td>
                                <td width="11%" align="center" style="vertical-align: middle;">0</td>
                                <td width="11%" align="center" style="vertical-align: middle;">-1</td>
                                <td width="11%" align="center" style="vertical-align: middle;">-2</td>
                                <td width="11%" align="center" style="vertical-align: middle;">-3</td>
                                <td width="11%" align="center" style="vertical-align: middle;">-4</td>
                            </tr>
                            <tr>
                                <td align="center" style="vertical-align: middle;">9</td>
                                <td align="center" style="vertical-align: middle;">7</td>
                                <td align="center" style="vertical-align: middle;">5</td>
                                <td align="center" style="vertical-align: middle;">3</td>
                                <td align="center" style="vertical-align: middle;">1</td>
                                <td align="center" style="vertical-align: middle;">1/3</td>
                                <td align="center" style="vertical-align: middle;">1/5</td>
                                <td align="center" style="vertical-align: middle;">1/7</td>
                                <td align="center" style="vertical-align: middle;">1/9</td>
                            </tr>
                            <tr style="background-color: #3097d1 !important;color: white !important;">
                                <td colspan="9">Detail :</td>
                            </tr>
                            <tr>
                                <td colspan="9">9 = Mutlak Sangat Penting</td>
                            </tr>
                            <tr>
                                <td colspan="9">7 = Sangat Lebih Penting</td>
                            </tr>
                            <tr>
                                <td colspan="9">5 = Lebih Penting</td>
                            </tr>
                            <tr>
                                <td colspan="9">3 = Cukup Penting</td>
                            </tr>
                            <tr>
                                <td colspan="9">1 = Sama Sama Penting</td>
                            </tr>
                            <tr>
                                <td colspan="9">1/3 = Tidak Cukup Penting</td>
                            </tr>
                            <tr>
                                <td colspan="9">1/5 = Tidak Lebih Penting</td>
                            </tr>
                            <tr>
                                <td colspan="9">1/7 = Tidak Sangat Lebih Penting</td>
                            </tr>
                            <tr>
                                <td colspan="9">1/9 = Tidak Mutlak Sangat Penting</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    @if(session()->has('update-alternatif'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" style="outline: none;"><i class="ion-close-circled"></i></button>	
            {{ session('update-alternatif') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h4 style="margin: 0;">Proses SAW</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if($data['dataFindRank']['alternatif']->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Alternatif Masih Kosong</h1>
                        </div>
                    @else
                        <table class="table table-bordered table-hover" style="margin: 0;">
                            <thead>
                                <tr>
                                    <td align="center" style="vertical-align: middle;">SAW</td>
                                    @foreach ( $data['dataFindRank']['kriteria'] as $i => $dataKriteria )
                                        <td>{{ $dataKriteria->name }}</td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $data['dataFindRank']['bobot_alternatif'] as $i => $dataBobotAlternatif )
                                    <tr>
                                        <td align="center" style="vertical-align: middle;">{{ $dataBobotAlternatif[0]->alternatif->name }}</td>
                                        @foreach ( $data['dataFindRank']['kriteria'] as $iKr => $dataKriteria )
                                            <td style="vertical-align: middle;">{{$dataBobotAlternatif[$iKr]->bobot }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">.</td>
                                </tr>
                                <tr>
                                    <td align="center" style="vertical-align: middle;">MIN</td>
                                    @foreach ( $data['dataFindRank']['minSaw'] as $i => $dataMinSaw )
                                        <td style="vertical-align: middle;">{{ $dataMinSaw }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td align="center" style="vertical-align: middle;">MAX</td>
                                    @foreach ( $data['dataFindRank']['maxSaw'] as $i => $dataMaxSaw )
                                        <td style="vertical-align: middle;">{{ $dataMaxSaw }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
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
                        <h4 style="margin: 0;">Normalisasi SAW</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if($data['dataFindRank']['alternatif']->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Alternatif Masih Kosong</h1>
                        </div>
                    @else
                        <table class="table table-bordered table-hover" style="margin: 0;">
                            <thead>
                                <tr>
                                    <td align="center" style="vertical-align: middle;">SAW</td>
                                    @foreach ( $data['dataFindRank']['kriteria'] as $i => $dataKriteria )
                                        <td>{{ $dataKriteria->name }}</td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $data['dataFindRank']['normalisasi'] as $i => $dataNormalisasi )
                                    <tr>
                                        <td align="center" style="vertical-align: middle;">{{ $data['dataFindRank']['bobot_alternatif'][$i][0]->alternatif->name }}</td>
                                        @foreach ( $data['dataFindRank']['kriteria'] as $iKr => $dataKriteria )
                                            <td style="vertical-align: middle;">{{$dataNormalisasi[$iKr] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                        <h4 style="margin: 0;">Perhitungan AHP-SAW</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if($data['dataFindRank']['alternatif']->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Alternatif Masih Kosong</h1>
                        </div>
                    @else
                        <table class="table table-bordered table-hover" style="margin: 0;">
                            <thead>
                                <tr>
                                    <td align="center" style="vertical-align: middle;">SAW</td>
                                    @foreach ( $data['dataFindRank']['kriteria'] as $i => $dataKriteria )
                                        <td>{{ $dataKriteria->name }}</td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center" style="vertical-align: middle;">Bobot Kriteria</td>
                                    @foreach ( $data['dataFindRank']['dataFindCR']['eigenVector'] as $i => $dataEigenVector )
                                        <td style="vertical-align: middle;">{{ round($dataEigenVector,4) }}</td>
                                    @endforeach
                                </tr>
                                @foreach ( $data['dataFindRank']['ahpSaw'] as $i => $dataAhpSaw )
                                    <tr>
                                        <td align="center" style="vertical-align: middle;">{{ $data['dataFindRank']['bobot_alternatif'][$i][0]->alternatif->name }}</td>
                                        @foreach ( $data['dataFindRank']['kriteria'] as $iKr => $dataKriteria )
                                            <td style="vertical-align: middle;">{{ round($dataAhpSaw[$iKr], 4)}} </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                        <h4 style="margin: 0;">Ranking</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if($data['dataFindRank']['alternatif']->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Alternatif Masih Kosong</h1>
                        </div>
                    @else
                        <table class="table table-bordered table-hover" style="margin: 0;">
                            <thead>
                                <tr>
                                    <td width="10px" align="center" style="vertical-align: middle;">No</td>
                                    <td align="center" style="vertical-align: middle;">Alternatif Jurusan</td>
                                    <td align="center" style="vertical-align: middle;">Nilai Preferensi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $data['dataFindRank']['ranking'] as $i => $dataRanking )
                                    <tr>
                                        <td align="center" style="vertical-align: middle;">{{ $i+1 }}</td>
                                        <td align="center" style="vertical-align: middle;">{{ $data['dataFindRank']['bobot_alternatif'][$i][0]->alternatif->name }}</td>
                                        <td align="center" style="vertical-align: middle;">{{ $dataRanking }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
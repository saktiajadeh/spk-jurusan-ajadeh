@extends('layouts.app')

@section('content')

<div class="container">
    @if(session()->has('update-kriteria'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" style="outline: none;"><i class="ion-close-circled"></i></button>	
            {{ session('update-kriteria') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h4 style="margin: 0;">Matrix Pembobotan Antar Kriteria</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if($data['kriteria']->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Kriteria Masih Kosong</h1>
                        </div>
                    @else
                        <table class="table table-bordered table-hover" style="margin: 0;">
                            <tbody>
                                <tr style="background-color: #3097d1 !important;color: white !important;">
                                    <td><strong>Antar Kriteria</strong></td>
                                    @foreach ( $data['kriteria'] as $i => $dataKriteria )
                                        <td>{{ $dataKriteria->name }}</td>
                                    @endforeach
                                </tr>
                                @foreach ( $data['kriteria'] as $i => $dataKriteria )
                                    <tr>
                                        <td style="background-color: #3097d1 !important;color: white !important;">{{ $dataKriteria->name }}</td> 
                                        <td>{{ $data['dataFindCR']['matriks'][$i][0] }}</td>
                                        <td>{{ $data['dataFindCR']['matriks'][$i][1] }}</td>
                                        <td>{{ $data['dataFindCR']['matriks'][$i][2] }}</td>
                                    </tr>
                                @endforeach
                                <tr style="background-color: #3097d1 !important;color: white !important;">
                                    <td><strong>Jumlah</strong></td>
                                    @foreach ( $data['dataFindCR']['sumMatriks'] as $i => $dataSumMatriks )
                                        <td>{{ $dataSumMatriks }}</td>
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
                        <h4 style="margin: 0;">Normalisasi - Matrix Pembobotan Antar Kriteria</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    @if($data['kriteria']->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Kriteria Masih Kosong</h1>
                        </div>
                    @else
                        <table class="table table-bordered table-hover" style="margin: 0;">
                            <tbody>
                                <tr style="background-color: #3097d1 !important;color: white !important;">
                                    <td><strong>Antar Kriteria</strong></td>
                                    @foreach ( $data['kriteria'] as $i => $dataKriteria )
                                        <td>{{ $dataKriteria->name }}</td>
                                    @endforeach
                                </tr>
                                @foreach ( $data['kriteria'] as $i => $dataKriteria )
                                    <tr>
                                        <td style="background-color: #3097d1 !important;color: white !important;">{{ $dataKriteria->name }}</td> 
                                        <td>{{ $data['dataFindCR']['normalisasi'][$i][0] }}</td>
                                        <td>{{ $data['dataFindCR']['normalisasi'][$i][1] }}</td>
                                        <td>{{ $data['dataFindCR']['normalisasi'][$i][2] }}</td>
                                    </tr>
                                @endforeach
                                <tr style="background-color: #3097d1 !important;color: white !important;">
                                    <td><strong>Jumlah</strong></td>
                                    @foreach ( $data['dataFindCR']['sumNormalisasi'] as $i => $dataSumNormalisasi )
                                        <td>{{ $dataSumNormalisasi }}</td>
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
                        <h4 style="margin: 0;">Consistency Ratio</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <p>Consistency Ratio adalah <strong style="color: #3097d1;">{{ $data['dataFindCR']['consistencyRatio'] }}</strong></p>
                    <p>Jika <strong>Consistency Ratio</strong> tidak terpenuhi silahkan ulangi lakukan pembobotan kriteria hingga <strong>Consistency Ratio</strong> terpenuhi. <br/>Untuk dapat terpenuhi harus bernilai < 0.1</p>
                    @if($data['dataFindCR']['consistencyRatio'] < 0.1)
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" style="outline: none;"><i class="ion-close-circled"></i></button>
                            <strong>Consistency Ratio Terpenuhi!</strong> Silahkan Lanjut ke Analisis Alternatif Jurusan
                        </div>
                        <a class="btn btn-success btn-md" href="{{ route('alternatif.edit', auth()->user()->id) }}" role="button">Lanjut ke Analisis Alternatif Jurusan</a>
                    @else
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" style="outline: none;"><i class="ion-close-circled"></i></button>
                            <strong>Consistency Ratio Tidak Terpenuhi!</strong> Silahkan ulangi lakukan pembobotan kriteria
                        </div>
                        <a class="btn btn-danger btn-md" href="{{ route('kriteria.edit', auth()->user()->id) }}" role="button">Pembobotan Kriteria Kembali</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

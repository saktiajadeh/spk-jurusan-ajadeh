@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="jumbotron text-center" style="margin: 0;">
                    <h1>Selamat datang ;)</h1>
                    <p>tak tung tung</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Master Data</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h3 style="display: flex; align-items: center;"><i class="ion-ios-list" style="font-size: 50px; margin-right: 10px;"></i>Data Kriteria</h3>
                                    <p><a href="{{ route('kriteria.index') }}" class="btn btn-primary" role="button">Menuju</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h3 style="display: flex; align-items: center;"><i class="ion-ios-list" style="font-size: 50px; margin-right: 10px;"></i>Data Alternatif Jurusan</h3>
                                    <p><a href="#" class="btn btn-primary" role="button">Menuju</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Analisis Data</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h3 style="display: flex; align-items: center;"><i class="ion-ios-analytics" style="font-size: 50px; margin-right: 10px;"></i>Analisis Kriteria</h3>
                                    <p><a href="{{ route('kriteria.edit', auth()->user()->id) }}" class="btn btn-primary" role="button">Menuju</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h3 style="display: flex; align-items: center;"><i class="ion-ios-analytics" style="font-size: 50px; margin-right: 10px;"></i>Analisis Alternatif Jurusan</h3>
                                    <p><a href="#" class="btn btn-primary" role="button">Menuju</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h3 style="display: flex; align-items: center;"><i class="ion-flash" style="font-size: 50px; margin-right: 10px;"></i>Ranking</h3>
                                    <p><a href="#" class="btn btn-primary" role="button">Menuju</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

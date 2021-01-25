@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h4 style="margin: 0;">Data Alternatif</h4>
                    </div>
                    
                    <div class="pull-right">
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if($data['alternatif']->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Alternatif Masih Kosong</h1>
                        </div>
                    @else
                        <table class="table table-bordered table-hover" style="margin: 0;">
                            <thead>
                                <tr>
                                    <td align="center" style="vertical-align: middle;">SAW</td>
                                    @foreach ( $data['kriteria'] as $i => $dataKriteria )
                                        <td>{{ $dataKriteria->name }}</td>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $data['bobot_alternatif'] as $i => $dataBobotAlternatif )
                                    <tr>
                                        <td align="center" style="vertical-align: middle;">{{ $dataBobotAlternatif[0]->alternatif->name }}</td>
                                        @foreach ( $data['kriteria'] as $iKr => $dataKriteria )
                                            <td style="vertical-align: middle;">{{$dataBobotAlternatif[$iKr]->bobot }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right" style="margin-top: 20px;">
                            <p><a class="btn btn-primary btn-md" href="{{ route('alternatif.edit', auth()->user()->id) }}" role="button">Analisis Alternatif</a></p>
                        </div>
                        <div class="clearfix"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
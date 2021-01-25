@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h4 style="margin: 0;">Pembobotan Alternatif</h4>
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
                        <form method="POST" action="{{ route("alternatif.update", auth()->user()->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT"/>
                            @foreach ( $data['bobot_alternatif'] as $i => $dataBobotAlternatif )
                                <div style="border: 1px solid #3097d1; padding: 10px; margin-bottom: 30px; border-radius: 5px;">
                                    <p style="font-weight: bold;text-align: center;">{{ $dataBobotAlternatif[0]->alternatif->name }}</p>
                                    @foreach ( $data['kriteria'] as $iKr => $dataKriteria )
                                        <div style="display: flex;justify-content: space-between; margin-bottom: 0;">
                                            <p style="min-width: 65px;">{{ $dataBobotAlternatif[$iKr]->kriteria->name }}</p>
                                            <div style="width: 100%; padding: 0 20px; padding-top: 8px;">
                                                <input name="{{ "bobot_".$dataBobotAlternatif[$iKr]->id }}" class="slider-bar" id="{{ "bobot_".$dataBobotAlternatif[$iKr]->id }}" type="range" min="1" max="100" step="1" value="{{ $dataBobotAlternatif[$iKr]->bobot }}" oninput="{{ "output_bobot_".$dataBobotAlternatif[$iKr]->id }}.textContent = {{ 'bobot_'.$dataBobotAlternatif[$iKr]->id }}.value"/>
                                            </div>
                                            <p id="{{ "output_bobot_".$dataBobotAlternatif[$iKr]->id }}" style="min-width: 25px;">{{ $dataBobotAlternatif[$iKr]->bobot }}</p>
                                        </div>
                                    @endforeach
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
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
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
                    @if($kriteria->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Kriteria Masih Kosong</h1>
                        </div>
                    @else
                        @if(session()->has('status-ahp'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                {{ session('status-ahp') }}
                            </div>
                        @endif
                        on progress bro
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
                    @if($kriteria->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Kriteria Masih Kosong</h1>
                        </div>
                    @else
                        @if(session()->has('status-ahp'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>	
                                {{ session('status-ahp') }}
                            </div>
                        @endif
                        on progress bro
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

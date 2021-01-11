@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h4 style="margin: 0;">Data Kriteria</h4>
                    </div>
                    
                    <div class="pull-right">
                        <a href="{{ route('kriteria.create') }}">
                            <button type="button" class="btn btn-xs btn-default">Tambah Data Kriteria</button>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    @if($kriteria->isEmpty())
                        <div class="jumbotron text-center" style="margin: 0;">
                            <h1>Data Kriteria Masih Kosong</h1>
                            <p><a class="btn btn-primary btn-lg" href="{{ route('kriteria.create') }}" role="button">Tambah Data Kriteria</a></p>
                        </div>
                    @else
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" style="margin: 0;">
                                <thead>
                                    <tr>
                                        <td style="width: 10px;">No</td>
                                        <td>Name</td>
                                        <td align="center" style="width: 151px;">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $kriteria as $i => $dataKriteria )
                                        <tr>
                                            <td align="center" style="vertical-align: middle;">{{ $i+1 }}</td>
                                            <td style="vertical-align: middle;">{{ $dataKriteria->name }}</td>
                                            <td style="vertical-align: middle;">
                                                <form method="POST" action="{{ route('kriteria.destroy', $dataKriteria->id) }}">
                                                    {{ csrf_field() }}
                                                    <a href="{{ route('kriteria.edit', $dataKriteria->id) }}">
                                                        <button type="button" class="btn btn-primary">Ubah</button>
                                                    </a>
                                                    <input type="hidden" name="_method" value="DELETE"/>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

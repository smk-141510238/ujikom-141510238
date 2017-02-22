@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>

                <div class="panel-body">
                    {!! Form::model($tunjanganpegawai,['method' => 'PATCH','route'=>['tunjanganpegawai.update',$tunjanganpegawai->id]]) !!}
                <div class="form-group">
                    {!! Form::label('kode_tunjangan_id', 'Kode Tunjangan') !!}
                    {!! Form::text('kode_tunjangan_id',$tunjanganpegawai->kode_tunjangan_id,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('id_pegawai', 'Id Pegawai') !!}
                    {!! Form::text('id_pegawai',$tunjanganpegawai->kode_tunjangan_id,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('SAVE', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
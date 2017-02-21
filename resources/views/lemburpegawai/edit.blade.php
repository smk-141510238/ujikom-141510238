@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>

                <div class="panel-body">
                    {!! Form::model($lemburpegawai,['method' => 'PATCH','route'=>['lemburpegawai.update',$lemburpegawai->id]]) !!}
                <div class="form-group">
                    {!! Form::label('kode_lembur_id', 'Kode Lembur Id: ') !!}
                    {!! Form::text('kode_lembur_id',$lemburpegawai->kode_lembur_id,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('id_pegawai', 'Id Pegawai : ') !!}
                    {!! Form::text('id_pegawai',$lemburpegawai->id_pegawai,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('jumlah_jam', 'Jumlah Jam : ') !!}
                    {!! Form::text('jumlah_jam',$lemburpegawai->jumlah_jam,['class'=>'form-control']) !!}
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
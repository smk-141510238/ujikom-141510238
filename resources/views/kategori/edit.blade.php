@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>

                <div class="panel-body">
                    {!! Form::model($kategori,['method' => 'PATCH','route'=>['kategori.update',$kategori->id]]) !!}
                <div class="form-group">
                    {!! Form::label('kode_lembur', 'Kode Lembur : ') !!}
                    {!! Form::text('kode_lembur',$kategori->kode_lembur,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('id_jabatan', 'Jabatan : ') !!}
                    {!! Form::text('nama_golongan',$kategori->nama_jabatan,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('id_golongan', 'Golongan : ') !!}
                    {!! Form::text('nama_golongan',$kategori->nama_golongan,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('besaran_uang', 'Besaran Uang : ') !!}
                    {!! Form::text('besaran_uang',$kategori->besaran_uang,['class'=>'form-control']) !!}
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
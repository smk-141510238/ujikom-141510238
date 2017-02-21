@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>

                <div class="panel-body">
                    {!! Form::model($tunjangan,['method' => 'PATCH','route'=>['tunjangan.update',$tunjangan->id]]) !!}
                <div class="form-group">
                    {!! Form::label('kode_tunjangan', 'Kode Tunjangan : ') !!}
                    {!! Form::text('kode_tunjangan',$tunjangan->kode_tunjangan,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('id_jabatan', 'Jabatan : ') !!}
                    {!! Form::text('nama_golongan',$tunjangan->nama_golongan,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('id_golongan', 'Golongan : ') !!}
                    {!! Form::text('nama_golongan',$tunjangan->nama_golongan,['class'=>'form-control']) !!}
                </div>

                 <div class="form-group">
                    {!! Form::label('status', 'Status : ') !!}
                    {!! Form::text('status',$tunjangan->status,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('besaran_uang', 'Besaran Uang : ') !!}
                    {!! Form::text('besaran_uang',$tunjangan->besaran_uang,['class'=>'form-control']) !!}
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
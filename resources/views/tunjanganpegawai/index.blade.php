@extends('layouts.app')

@section('content')

    <div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Data Tunjangan Pegawai</h1></strong></div>
        <div class="panel-body">
            
                <form class="form-search" >
                    <p class="text-right">
                    <input type="text" class="input-medium search-query">
                    <button type="submit" class="btn btn-info">Pencarian</button>
                </p></form>
        <a class="btn btn-success" href="{{url('tunjanganpegawai/create')}}">Tambah Data</a><br><br>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th><center>Id</th>
                        <th><center>Kode Tunjangan</th>
                        <th><center>Nama Pegawai</th>
                        <th><center>Besaran Uang</th>
                        <th colspan="3"><center>Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                @foreach ($tunjanganpegawai as $data)
                <tbody>
                    <tr>
                        <td> {{$id++}} </td>
                        <td> {{$data->tunjangan->kode_tunjangan}}</td>
                        <td> {{$data->pegawai->User->name}} </td>
                        <td> Rp.{{$data->tunjangan->besaran_uang}}</td>
                        <td><a href="{{route('tunjanganpegawai.edit',$data->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['tunjanganpegawai.destroy', $data->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
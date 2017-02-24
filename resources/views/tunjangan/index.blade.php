@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tunjangan</div>
        <div class="panel-body">
        <a class="btn btn-success" href="{{url('tunjangan/create')}}">Tambah Data</a><br><br>
        <div class="form-group" ><center>
            <form class="form-search" >
                <p class="text-left">
                   <form action="{{url('tunjangan')}}//?kode_tunjangan=kode_tunjangan">
                        <input type="text" name="kode_tunjangan" placeholder="nasukka kode tunjangan">
                        <button type="submit" class="btn btn-info" >cari</button>
                    </form>
                </p>
            </form>
        </div>
            <br>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>Id</th>
                        <th>Kode Tunjangan</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Status</th>
                        <th>Jumlah Anak</th>
                        <th>Besaran Uang</th>
                        <th colspan="3"><center>Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                @foreach ($tunjangan as $data)
                <tbody>
                    <tr> 
                        <td> {{$id++}} </td>
                        <td> {{$data->kode_tunjangan}} </td>
                        <td> {{$data->jabatan->nama_jabatan}} </td>
                        <td> {{$data->golongan->nama_golongan}} </td>
                        <td> {{$data->status}} </td>
                        <td> {{$data->jumlah_anak}} </td>
                        <td> {{$data->besaran_uang}} </td>
                        <td><a href="{{route('tunjangan.edit',$data->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['tunjangan.destroy', $data->id]]) !!}
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
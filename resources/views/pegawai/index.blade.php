@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Pegawai</div>
        <div class="panel-body">
        <a class="btn btn-success" href="{{url('pegawai/create')}}">Tambah Data</a><br><br>
        <div class="form-group" ><center>
            <form class="form-search" >
                <p class="text-left">
                   <form action="{{url('pegawai')}}//?nip=nip">
                        <input type="text" name="nip" placeholder="masukkan nip">
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
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Photo</th>
                        <th colspan="3">Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                @foreach ($pegawai as $data)
                <tbody>
                    <tr> 
                        <td> {{$id++}} </td>
                        <td> {{$data->nip}} </td>
                        <td> {{$data->User->name}} </td>
                        <td> {{$data->User->email}} </td>
                        <td> {{$data->jabatan->nama_jabatan}} </td>
                        <td> {{$data->golongan->nama_golongan}} </td>
                        <td>  <img src = "{{asset('/assets/image/'.$data->foto )}}" class="img-circle" height="35" width="35"></td>
                        <td><a href="{{route('pegawai.edit',$data->id)}}" class="btn btn-warning">Edit</a></td>
                        <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['pegawai.destroy', $data->id]]) !!}
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
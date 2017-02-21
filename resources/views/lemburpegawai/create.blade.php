@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Data Lembur Pegawai</div>
		<div class="panel-body">
			<form method="POST" action="{{url('lemburpegawai')}}">
			 	{{csrf_field()}}

			 	<div class="form-group">
					<label>Id Kode Lembur</label>	
					<div class="controls">
				  <select class="form-control" name="kode_lembur_id">
                                @foreach ($kategori as $data)
                                <option value="{{ $data->id }}">{{ $data->kode_lembur }}</option>
                                @endforeach
                            </select>
				</div>
      
                    <div class="control-group">
                        <label class="control-label">Id Pegawai</label>
                        <div class="controls">
                            <select class="span11" name="id_pegawai">
                                @foreach ($pegawai as $data)
                                <option value="{{ $data->id }}">{{ $data->User->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Jumlah Jam</label>
                        <input class="form-control" type="text" name="jumlah_jam" placeholder="Masukkan Jumlah Jam">
                           
                        </div>
                 

				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>

@stop
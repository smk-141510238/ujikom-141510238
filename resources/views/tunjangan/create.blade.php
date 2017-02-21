@extends('layouts.app')

@section('content')
	
<div class="container">
	<div class="panel panel-primary">
		<div class="panel-heading">Tambah Data Tunjangan</div>
		<div class="panel-body">
			<form method="POST" action="{{url('tunjangan')}}">
			 	{{csrf_field()}}

                    <div class="form-group">
                    <label>Kode Tunjangan</label>
                    <input class="form-control" type="text" name="kode_tunjangan" placeholder="Masukkan Kode Golongan">
                </div>

                    <div class="control-group">
                        <label class="control-label">Id Jabatan</label>
                        <div class="controls">
                            <select class="span11" name="id_jabatan">
                                @foreach ($jabatan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Id Golongan</label>
                        <div class="controls">
                            <select class="span11" name="id_golongan">
                                @foreach ($golongan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_golongan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                    <label>Status</label>
                    <input class="form-control" type="text" name="status" placeholder="Status">
                </div>

                <div class="form-group">
                    <label>Jumlah anak</label>
                    <input class="form-control" type="text" name="jumlah_anak" placeholder="Masukkan Kode Golongan">
                </div>

                    
				<div class="form-group">
					<label>Besaran Uang</label>
					<input class="form-control" type="text" name="besaran_uang" placeholder="Masukkan Besaran Uang">
				</div>

				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>

@stop
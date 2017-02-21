<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    //
    protected $table = 'pegawais';
    protected $fillable = array('nip','name','email','id_jabatan','id_golongan','foto');
    protected $visible = array('nip','name','email','id_jabatan','id_golongan','foto');

    public function User()
    {
    	return $this->BelongsTo('App\User','id_user');
    }
    public function golongan()
    {
    	return $this->hasMany('App\golongan','id_golongan');
    }
    public function jabatan()
    {
    	return $this->hasMany('App\jabatan','id_jabatan');
    }

    public function tunjangan_pegawai()
    {
        return $this->belongsTo('App\tunjangan_pegawai','id_pegawai');
    }
    
}

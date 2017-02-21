<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    //
    protected $table = 'jabatans'; 
    protected $fillable = array('id','kode_jabatan','id_jabatan','besaran_uang');
    protected $visible = array('id','kode_jabatan','id_jabatan','besaran_uang');

    public function tunjangan()
    {
    	return $this->belongsTo('App\tunjangan','id_jabatan');
    }
        public function kategori_lembur()
    {
    	return $this->hasMany('App\kategori_lembur','id_jabatan');
    }
    public function pegawai()
    {
        return $this->belongsTo('App\pegawai','id_jabatan');
    }
}

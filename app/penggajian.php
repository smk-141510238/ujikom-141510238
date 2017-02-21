<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penggajian extends Model
{
    protected $table = "penggajians";
    protected $fillable = array('id','tunjangan_pegawai_id','jumlah_uang_lembur','gaji_pokok','tanggal_pengambilan','status_pengambilan','petugas_penerima');
    protected $visible = array('id','tunjangan_pegawai_id','jumlah_uang_lembur','gaji_pokok','tanggal_pengambilan','status_pengambilan','petugas_penerima');

    public function tunjangan_pegawai()
    {
    	return $this->belongsTo('App\tunjangan_pegawai','tunjangan_pegawai_id');
    }
}

<?php

namespace App\Http\Controllers;

use App\tunjangan_pegawai;
use App\pegawai;
use App\tunjangan;
use Request;

class TunjanganpegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjanganpegawai = tunjangan_pegawai::with('tunjangan','pegawai')->get();
        $tunjanganpegawai = tunjangan_pegawai::where('kode_tunjangan_id', request('kode_tunjangan_id'))->paginate(0);
        if(request()->has('kode_tunjangan_id'))
        {
            $tunjanganpegawai = tunjangan_pegawai::where('kode_tunjangan_id', request('kode_tunjangan_id'))->paginate(0);
        }
        else
        {
            $tunjanganpegawai = tunjangan_pegawai::paginate(3);
        }
        return view ('tunjanganpegawai.index', compact('tunjanganpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tunjangan = tunjangan::all();
         $pegawai = pegawai::all();
         return view ('tunjanganpegawai.create', compact('pegawai','tunjangan')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tunjanganpegawai=Request::all();
        tunjangan_pegawai::create($tunjanganpegawai);
        return redirect('tunjanganpegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tunjanganpegawai = tunjangan_pegawai::find($id);
        return view('tunjanganpegawai.edit',compact('tunjanganpegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataUpdate=Request::all();
        $tunjanganpegawai=tunjangan_pegawai::find($id);
        $tunjanganpegawai->update($dataUpdate);
        return redirect('tunjanganpegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tunjangan_pegawai::find($id)->delete();
        return redirect('tunjanganpegawai');
    }
}

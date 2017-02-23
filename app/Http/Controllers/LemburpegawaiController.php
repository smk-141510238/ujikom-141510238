<?php

namespace App\Http\Controllers;

use Request;
use App\pegawai;
use App\kategori_lembur;
use App\lembur_pegawai;

class LemburpegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lemburpegawai = lembur_pegawai::with('kategori_lembur','pegawai')->get();
        $lemburpegawai = lembur_pegawai::where('kode_lembur_id', request('kode_lembur_id'))->paginate(0);
        if(request()->has('kode_lembur_id'))
        {
            $lemburpegawai = lembur_pegawai::where('kode_lembur_id', request('kode_lembur_id'))->paginate(0);
        }
        else
        {
            $lemburpegawai = lembur_pegawai::paginate(0);
        }
        return view('lemburpegawai.index', compact('lemburpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
   
        $kategori = kategori_lembur::all();
        $pegawai = pegawai::all();
        $lemburpegawai = lembur_pegawai::all();
        return view ('lemburpegawai.create', compact('lemburpegawai','kategori','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lemburpegawai=Request::all();
        lembur_pegawai::create($lemburpegawai);
        return redirect('lemburpegawai');
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
         $lemburpegawai=lembur_pegawai::find($id);
         $kategori = kategori_lembur::all();
         $pegawai = pegawai::all();
        return view('kategori.edit',compact('lemburpegawai','kategori','pegawai'));
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
        $lembur_pegawai=lembur_pegawai::find($id);
        $lembur_pegawai->update($dataUpdate);
        return redirect('lemburpegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lembur_pegawai::find($id)->delete();
        return redirect('lemburpegawai');
    }
}

<?php

namespace App\Http\Controllers;

use Request;
use App\jabatan;
use App\golongan;
use App\tunjangan;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan = tunjangan::with('jabatan','golongan')->get();
        $tunjangan = tunjangan::where('kode_tunjangan', request('kode_tunjangan'))->paginate(0);
        if(request()->has('kode_tunjangan'))
        {
            $tunjangan = tunjangan::where('kode_tunjangan', request('kode_tunjangan'))->paginate(0);
        }
        else
        {
            $tunjangan = tunjangan::paginate(3);
        }
        return view ('tunjangan.index', compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan = tunjangan::all();
         $jabatan = jabatan::all();
         $golongan = golongan::all();
         return view ('tunjangan.create', compact('tunjangan','jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tunjangan=Request::all();
        tunjangan::create($tunjangan);
        return redirect('tunjangan');
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
         $tunjangan=tunjangan::find($id);
         $jabatan = jabatan::all();
         $golongan = golongan::all();
        return view('tunjangan.edit',compact('tunjangan','jabatan','golongan'));
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
        $tunjangan=tunjangan::find($id);
        $tunjangan->update($dataUpdate);
        return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tunjangan::find($id)->delete();
        return redirect('tunjangan');
    }
}

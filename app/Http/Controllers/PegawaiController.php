<?php

namespace App\Http\Controllers;

use App\golongan;
use App\jabatan;
use App\pegawai;
use App\User;
use App\Form;
use Input;
use Illuminate\Http\Request;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class PegawaiController extends Controller
{
        use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawai = pegawai::all();
        $pegawai = pegawai::where('nip', request('nip'))->paginate(100);
        if(request()->has('nip'))
        {
            $pegawai = pegawai::where('nip', request('nip'))->paginate(100);
        }
        else
        {
            $pegawai =pegawai::paginate(100);
        }
        return view ('pegawai.index', compact('pegawai'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = pegawai::all();
        $golongan = golongan::all();
        $jabatan = jabatan::all();
        return view ('pegawai.create', compact('pegawai','golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
                'name' => 'required',
                'nip' => 'required|numeric|min:3|unique:pegawais',
                'permission' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                ]);

                $user = User::create([
                    'name' => $request->get('name'),
                    'permission' => $request->get('permission'),
                    'email' => $request->get('email'),
                    'password' => bcrypt($request->get('password')),
                ]);

        $file = Input::file('foto');
        $destinationPath = public_path().'/assets/image/';
        $filename = $file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);

        if(Input::hasFile('foto')){
        $pegawai= new pegawai;
        $pegawai->nip=Input::get('nip');
        $pegawai->id_jabatan =Input::get('id_jabatan');
        $pegawai->id_golongan=Input::get('id_golongan');
        $pegawai->id_user =$user->id;
        $pegawai->foto = $filename;
        $pegawai->save();

                return redirect('/pegawai');

          
          }  
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
          $jabatan=jabatan::all();
          $golongan = golongan::all();
          $pegawai = pegawai::find($id);
        return view('pegawai.edit',compact('jabatan','golongan','pegawai')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
        $dataUpdate=Input::all();
        $pegawai=pegawai::find($id);
        $pegawai->update($dataUpdate);
        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pegawai::find($id)->delete();
        return redirect('pegawai');
    }
}

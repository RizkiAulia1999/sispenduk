<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Dusun;
use App\Models\Agama;
class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $penduduk = Penduduk::with('dusun','agama')->get();
       // $penduduk = Penduduk::with('agama')->get();

        if($keyword){
            $penduduk = Penduduk::where("nama","LIKE","%$keyword%")->get();
        }

        return view('penduduk.index',['penduduks'=>$penduduk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dusun = Dusun::all();
        $agama = Agama::all();
        return view('penduduk.create',['dusun'=>$dusun,'agama'=>$agama]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penduduk = new Penduduk;    
        $dusun = new Dusun;  
        $agama = new Agama;     

        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->tanggallahir = $request->tanggallahir;
        $dusun->id = $request->dusun;
        $agama->id = $request->agama;
        $penduduk->jeniskelamin= $request->jeniskelamin;
        $penduduk->pekerjaan= $request->pekerjaan;

        $penduduk->dusun()->associate($dusun);
        $penduduk->agama()->associate($agama);
        $penduduk->save();

        //if true , redirect to index
        return redirect()->route('penduduk.index')
            -> with('success','Add data success!');
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
        $penduduk = Penduduk::find($id);
        $dusun = Dusun::all();
        return view('penduduk.edit',['penduduks'=>$penduduk,'dusun'=>$dusun]);

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
        $penduduk = Penduduk::find($id);
        $dusun = new Dusun; 

        $penduduk->id= $request->id;
        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->tanggallahir = $request->tanggallahir;
        $dusun->id = $request->dusun;
        $penduduk->jeniskelamin= $request->jeniskelamin;
        $penduduk->pekerjaan= $request->pekerjaan;

        $penduduk->dusun()->associate($dusun);
        $penduduk->save();

        return redirect()->route('penduduk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->delete();
        return redirect()->route('penduduk.index');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kematian;
use App\Models\Penduduk;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kematian= kematian::with('penduduks')->get();
        return view('kematian.index',['kematians'=>$kematian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::all();
        return view('kematian.create',['penduduks'=>$penduduk]);
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
        $kematian = new kematian;  

        $penduduk->id = $request->nik;
        $kematian->umur = $request->umur;
        $kematian->tanggalkematian= $request->tanggalkematian;
        $kematian->tempatkematian= $request->tempatkematian;

        $kematian->penduduks()->associate($penduduk);
        $kematian->save();

        //if true , redirect to index
        return redirect()->route('kematian.index')
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
        $kematian = kematian::find($id);
        $penduduk = Penduduk::all();
        return view('kematian.edit',['kematians'=>$kematian,'penduduks'=>$penduuk]);

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
        $kematian = kematian::find($id);
        $penduduk = new Penduduk; 

        $penduduk->id = $request->nik;
        $kematian->umur = $request->umur;
        $kematian->tanggalkematian= $request->tanggalkematian;
        $kematian->tempatkematian= $request->tempatkematian;

        $kematian->penduduks()->associate($penduduk);
        $kematian->save();

        //if true , redirect to index
        return redirect()->route('kematian.index')
            -> with('success','Add data success!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kematian = kematian::find($id);
        $kematian->delete();
        return redirect()->route('kematian.index');
    }
}

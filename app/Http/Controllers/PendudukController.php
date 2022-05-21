<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

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
        $penduduk = Penduduk::all();

        
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
        $penduduk = Penduduk::all();
        return view('penduduk.create',['penduduks'=>$penduduk]);
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

        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->tanggallahir = $request->tanggallahir;
        $penduduk->alamat= $request->alamat;
        $penduduk->jeniskelamin= $request->jeniskelamin;
        $penduduk->pekerjaan= $request->pekerjaan;

        $penduduk->save();
     
        //add data
        //Student::create($request->all());

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
        return view('penduduk.edit',['penduduks'=>$penduduk]);

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
        $penduduk->id= $request->id;
        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->tanggallahir = $request->tanggallahir;
        $penduduk->alamat= $request->alamat;
        $penduduk->jeniskelamin= $request->jeniskelamin;
        $penduduk->pekerjaan= $request->pekerjaan;

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

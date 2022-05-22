<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dusun;

class DusunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $dusun = Dusun::all();
        
        if($keyword){
            $dusun = Dusun::where("nama","LIKE","%$keyword%")->get();
        }

        return view('dusun.index',['dusuns'=>$dusun]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dusun= Dusun::all();
        return view('dusun.create',['dusuns'=>$dusun]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dusun= new Dusun;     
        
        $dusun->nama = $request->nama;
        $dusun->rt = $request->rt;
        $dusun->rw= $request->rw;

        $dusun->save();
     
        //add data
        //Student::create($request->all());

        //if true , redirect to index
        return redirect()->route('dusun.index')
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
        $dusun = Dusun::find($id);
        return view('dusun.edit',['dusuns'=>$dusun]);
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
        $dusun = Dusun::find($id);
        $dusun->id= $request->id;
        $dusun->nama = $request->nama;
        $dusun->rt = $request->rt;
        $dusun->rw= $request->rw;

        $dusun->save();

        return redirect()->route('dusun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dusun = Dusun::find($id);
        $dusun->delete();
        return redirect()->route('dusun.index');

    }
}

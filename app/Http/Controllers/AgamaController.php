<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $agama = Agama::all();

        if($keyword){
            $agama = Agama::where("agama","LIKE","%$keyword%")->get();
        }

        return view('agama.index',['agamas'=>$agama]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agama = Agama::all();
        return view('agama.create',['agamas'=>$agama]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agama = new Agama;
        $agama->agama = $request->agama;
        $agama->jumlah = $request->jumlah;

        $agama->save();

        //if true , redirect to index
        return redirect()->route('agama.index')
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
        $agama = Agama::find($id);
        return view('agama.edit',['agamas'=>$agama]);
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
        $agama = Agama::find($id);
        $agama->agama = $request->agama;
        $agama->jumlah = $request->jumlah;

        $agama->save();

        return redirect()->route('agama.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agama = Agama::find($id);
        $agama->delete();
        return redirect()->route('agama.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$search = $request->search;
        $makanans = DB::table('makanans')
        ->where('nama','like',"%".$search."%")
        ->paginate();
        return view('/list',['makanans' => $makanans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $makanans= $request->all();
        makanan::create( [
        'nama'=>request('nama'),
        "image"=>$request->file('image')->store('post-image'),
        "harga"=>request('harga')
        ]);
        return redirect("/list")->with("Succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(makanan $id)
    {
        $makanans=makanan::find($id);
        return view('detail',['makanans'=>$makanans]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(makanan $id)
    {
        $makanans=makanan::find($id);
        return view('edit',['makanans'=>$makanans]);
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
        makanan::find($id)->update( [
            'nama'=>request('nama'),
            "image"=>$request->file('image')->store('post-image'),
            "harga"=>request('harga'),
            ]);
            return redirect("/list")->with("Succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(makanan $id)
    {
        $makanans = makanan::find($id);
        $makanans->each->delete();
        return redirect("/list");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function input()
    {
        return view('input');
    }
    public function index()
    {
        $barang = DB::table('tb_barang')->get();
        return view('welcome', ['tb_barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $filegambar = $request->file('gambar');
        $namagambar = time()."_".$filegambar->getClientOriginalName();

        $folder = 'data/img';
        $filegambar->move($folder,$namagambar);

        $dataBarang = new Barang;
        $dataBarang->nama = $request->nama;
        $dataBarang->harga = $request->harga;
        $dataBarang->img = $namagambar;

        $dataBarang->save();

        return redirect('/');
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
        $barang = DB::table('tb_barang')->where('id',$id)->get();
        return view('edit',['tb_barang' => $barang]);
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
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $filegambar2 = $request->file('gambar');
        $namagambar2 = time()."_".$filegambar2->getClientOriginalName();

        $folder2 = 'data/img';
        $filegambar2->move($folder2,$namagambar2);

        DB::table('tb_barang')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'img' => $namagambar2
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::findOrFail($id);
        $data->delete();
        return redirect('/');
    }
}

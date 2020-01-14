<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\harga;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show = harga::all();
        $data = [
            'show' => $show,
        ];
        return view('pages.admin.harga.index')->with('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.harga.create');
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
        $this->validate($request,[
            'harga_pakai' => 'required',
            'harga_beban' => 'required',
            ]);
        $data = new harga;
        $data->harga_pakai = $request->harga_pakai;
        $data->harga_beban = $request->harga_beban;
        $data->save();

        return redirect('/harga')->with('message','Tambah Data Berhasil');
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
        //
        $data = harga::find($id);
        return view('pages.admin.harga.edit')->with('list', $data);
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
        //
        $this->validate($request,[
            'harga_pakai' => 'required',
            'harga_beban' => 'required',
            ]);
        $data = harga::find($id);
        $data->harga_pakai = $request->harga_pakai;
        $data->harga_beban = $request->harga_beban;
        $data->save();

        return redirect('/harga')->with('message','Perubahan Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = harga::find($id);
        $data->delete();
        // redirect
        return \Redirect::to('/harga')->with('message','Hapus Data harga Berhasil');
    }
}

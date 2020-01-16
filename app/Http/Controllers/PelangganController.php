<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pelanggan;
use App\User;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $show = pelanggan::all();
        $data = [
            'show' => $show,
        ];
        return view('pages.admin.pelanggan.index')->with('list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     return view('pages.admin.pelanggan.tambahpelanggan');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    //     $this->validate($request,[
    //         'rekening' => 'required',
    //         'nama' => 'required',
    //         'alamat' => 'required',
    //         'hp' => 'required',
    //         'meteran' => 'required',
    //         ]);
    //     $data = new pelanggan;
    //     $data->rekening = $request->rekening;
    //     $data->nama = $request->nama;
    //     $data->alamat = $request->alamat;
    //     $data->hp = $request->hp;
    //     $data->meteran = $request->meteran;
    //     $data->save();

    //     return redirect('/pelanggan')->with('message','Tambah Data Berhasil');
    // }

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
        $data = pelanggan::find($id);
        return view('pages.admin.pelanggan.edit')->with('list', $data);
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
        $this->validate($request,[
            'rekening' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            // 'meteran' => 'required',
            ]);
        $data = pelanggan::find($id);
        $data->rekening = $request->rekening;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->hp = $request->hp;
        // $data->meteran = $request->meteran;
        $data->save();

        return redirect('/pelanggan')->with('message','Perubahan Data Berhasil');
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
        $data = pelanggan::find($id);
        $data->delete();
        // redirect
        return redirect('/pelanggan')->with('message','Hapus Data Karyawan Berhasil');
    }

    // public function datapribadi(){
    //     $user_id = Auth::id();
    //     $datapribadi = pelanggan::where('rekening',$user_id)->get();
    //     dd($datapribadi);
    // }
}

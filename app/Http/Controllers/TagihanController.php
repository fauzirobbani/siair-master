<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\model\Transaksi;
use App\Model\Harga;
use App\pelanggan;
use Validation;

use Carbon\Carbon;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $harga = Harga::first();
        $pelanggan= Pelanggan::get();
        return view('pages.tambahtagihan', compact('harga', 'pelanggan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'harga_pakai' => 'required',
        //     'harga_beban' => 'required',
        //     ]);
        
        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('Y');
        $tanggal = Carbon::now()->format('Y/m/d');

        $id_pelanggan = Pelanggan::where('rekening', $request->no_rekening)->first();

        $data = Transaksi::updateOrCreate([
            'bulan' => $bulan,
            'tahun' => $tahun,
            'id_pelanggan' => $id_pelanggan->id,

        ],
        [
            'meteran_baru' => $request->meteran_baru,
            'meteran_tagihan' => $request->volume,
            'status_bayar' => "0",
            'tagihan' => $request->total,

        ]);

        return redirect('/tagihan')->with('message','Tambah Data Berhasil');
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
    }
    
    
    public function datapelanggan(Request $request)
    {
        $data = Pelanggan::where('rekening', $request->kode)->first();
        
        return $data;
    }
}

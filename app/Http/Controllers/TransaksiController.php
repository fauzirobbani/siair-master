<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Transaksi;
use App\model\Tagihan;
use App\Model\Harga;
use App\Pelanggan;

class TransaksiController extends Controller
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
    public function create($id)
    {
        $tagihan = Tagihan::where('id', $id)->first();
        // $pelanggan= Pelanggan::get();
        return view('pages.pembayaran', compact('tagihan'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        // dd($request);
        $tanggal = Carbon::now()->format('Y/m/d');

        $tagihan = Tagihan::findOrfail($id);
        $tagihan->status_bayar = 1;
        $tagihan->tanggal = $tanggal;

        $tagihan->save();

        $transaksi = new Transaksi;
        $transaksi->id_tagihan = $tagihan->id; 
        $transaksi->pembayaran = $request->pembayaran;
        $transaksi->kembalian = $request->pembayaran - $tagihan->tagihan;
        $transaksi->tanggal_transaksi = $tanggal;
        $transaksi->bulan_transaksi = $tagihan->bulan;
        $transaksi->tahun_transaksi = $tagihan->tahun;

        $transaksi->save();
    
        return redirect('/tagihan');
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
        $tagihan = Tagihan::where('id', )->first();
        $pelanggan= Pelanggan::get();
        return view('pages.pembayaran', compact('tagihan', 'pelanggan'));
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
}

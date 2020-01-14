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
        $tagihan = Tagihan::where('id')->first();
        $pelanggan= Pelanggan::where('id')->first();
        return view('pages.admin.laporan.laporan', compact('pelanggan', 'tagihan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd ('cek');
        $tagihan = Tagihan::first();
        $pelanggan= Pelanggan::get();
        return view('pages.pembayaran', compact('tagihan', 'pelanggan'));

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

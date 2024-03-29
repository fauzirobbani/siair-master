<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tagihan;
use App\Model\Transaksi;
use App\Model\Laporan;
use App\Model\Harga;

use App\Model\Pelanggan;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //

        $show = Transaksi::with('pelanggan','tagihan')->get();

        $data = [
            'show' => $show,
        ];
        // dd($data);
        // return $show;
        // die;
        return view('pages.admin.laporan.index')->with('list', $data);

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
        $data = Transaksi::where('id', $id)->first();

        // return view('pages.admin.invoice.index', compact('data'));
        $pdf = PDF::loadView('pages.admin.invoice.index', compact('data'))->setPaper('a4', 'landscape');

        return $pdf->stream($data->tanggal_transaksi.'_'.$data->pelanggan['rekening'].'_invoice.pdf');
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

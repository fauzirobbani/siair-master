<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\model\Tagihan;
use App\model\Transaksi;
use App\Model\Harga;
use App\Model\pelanggan;
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

        $show = tagihan::with('pelanggan')->where('status_bayar', '0')->get();

        $data = [
            'show' => $show,
        ];
        // return $show;
        // die;
        return view('pages.admin.tagihan.tagihan')->with('list', $data);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $harga = Harga::first();
        $pelanggan= Pelanggan::get();
        return view('pages.admin.tagihan.tambahtagihan', compact('harga', 'pelanggan'));

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

        $data = Tagihan::updateOrCreate([
            'bulan' => $bulan,
            'tahun' => $tahun,
            'id_pelanggan' => $id_pelanggan->id,

        ],
        [
            'meteran_baru' => $request->meteran_baru,
            'volume' => $request->volume,
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

    public function pembayaran($id)
    {
        //
        $tagihan = Tagihan::where('id', $id)->first();
        $pelanggan= Pelanggan::where('id',$id)->first();
        return view('pages.admin.tagihan.pembayaran', compact('pelanggan', 'tagihan'));
    }

    public function storepembayaran(Request $request, $id)
    {
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

        $meteran = Pelanggan::findOrfail($tagihan->id);
        $meteran->meteran = $meteran->meteran+$tagihan->meteran_baru;
        $meteran->save();

        return redirect('/tagihan');

    }
}

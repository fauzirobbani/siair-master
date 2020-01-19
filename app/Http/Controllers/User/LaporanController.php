<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pelanggan;
use App\Model\Tagihan;
// use App\Model\Transaksi;
use App\User;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
        //
        public function index()
        {
            //
            $id_pelanggan = Auth::user()->username;
            // dd($id_user);

            $pelanggan = pelanggan::where('rekening', $id_pelanggan)->first();

            $show = Tagihan::with('pelanggan', 'transaksi')->where('id_pelanggan', $pelanggan->id)->where('status_bayar', 1)->get();


            return view('pages.users.laporan.index')->with('list', $show);

        }
}

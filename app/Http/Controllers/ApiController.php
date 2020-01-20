<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Tagihan;
use App\model\Transaksi;
use App\Model\pelanggan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;

class ApiController extends Controller
{
    //
    public function tagihan()
    {
        //

        $show = tagihan::with('pelanggan')->where('status_bayar', '0')->get();

        return response()->json([
            'status' => true,
            'data' => $show,
            'message' => 'succes'
        ]);

    }

    public function laporan()
    {
        //
        //

        $show = Transaksi::with('pelanggan','tagihan')->get();

        return response()->json([
            'status' => true,
            'data' => $show,
            'message' => 'succes'
        ]);

    }

    public function create_tagihan(Request $request)
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

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'succes'
        ]);
    }

    public function login(Request $request)
    {
        //
        //

        $user = User::where('username', $request->username)->where('status', 1)->first();

        if (empty($user)) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'User tidk dtemukan'
            ], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'password salah'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'login succes'
        ]);

    }

    public function login_user(Request $request)
    {
        $user = User::where('username', $request->username)->where('status', 0)->first();

        if (empty($user)) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'User tidk dtemukan'
            ], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'password salah'
            ], 400);
        }

        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'login succes'
        ]);

    }

    public function laporan_user($id_pelanggan)
    {

         $show = Tagihan::with('pelanggan', 'transaksi')->where('id_pelanggan', $id_pelanggan)->where('status_bayar', 1)->get();

        return response()->json([
            'status' => true,
            'data' => $show,
            'message' => 'succes'
        ]);

    }

    public function tagihan_user($id_pelanggan)
    {

        $show = Tagihan::with('pelanggan', 'transaksi')->where('id_pelanggan', $id_pelanggan)->where('status_bayar', 0)->get();

        return response()->json([
            'status' => true,
            'data' => $show,
            'message' => 'succes'
        ]);

    }

}

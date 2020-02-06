<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tagihan;
use App\Model\Transaksi;
use App\Model\Pelanggan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\User;

class ApiController extends Controller
{
    //
    public function tagihan()
    {
        //

        $show = Tagihan::with('pelanggan')->where('status_bayar', '0')->get();

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

        $user = User::where('username', $request->username)->first();

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

    public function pelanggan($id)
    {
        $list = Pelanggan::find($id);
        $user = User::where('username', $list->rekening)->first();

        return response()->json([
            'status' => true,
            'data' => ['pelanggan' => $list, 'user' => $user],
            'message' => 'login succes'
        ]);
    }

    public function pelanggan_update(Request $request, $id)
    {
        $this->validate($request,[
            // 'rekening' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'email' => 'required',
            ]);
        $data = Pelanggan::find($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->hp = $request->hp;
        $data->save();

        $user = User::where('username', $data->rekening)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        return response()->json([
            'status' => true,
            'data' => [],
            'message' => 'succes update data'
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

    public function pelanggan_all()
    {
        //
        $show = Pelanggan::all();

        return response()->json([
            'status' => true,
            'data' => $show,
            'message' => 'succes'
        ]);
    }

}

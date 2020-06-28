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

    public function pelanggan_by_rekening($rekening) {
        $pelanggan = Pelanggan::where('rekening', $rekening)->first();

        if (empty($pelanggan)) {
            return response()->json([
                'status' => false,
                'data' => null,
                'message' => 'pelanggan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $pelanggan,
            'message' => 'pelanggan sukses'
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

        $show = Tagihan::with('pelanggan', 'transaksi')->where('id_pelanggan', $id_pelanggan)->where('status_bayar', 0)->first();

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

    public function grafik()
    {
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];
        $data = Tagihan::selectRaw('bulan, sum(volume) as jumlah_volume')->groupBy('bulan')->orderBy('bulan', 'ASC')->get();
        foreach ($data as $key => $value) {
            $data[$key]->bulan = $bulan[$value->bulan];
            $data[$key]->jumlah_volume = intval($value->jumlah_volume);
        }
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'succes'
        ]);
    }

}

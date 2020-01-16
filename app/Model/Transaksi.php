<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table = 'transaksi';
    public $timestamps = true;

    protected $fillable = [
        'id_tagihan',
        'id_pelanggan',
        'pembayaran',
        'kembalian',
        'tanggal_transaksi',
        'bulan_transaksi',
        'tahun_transaksi',
    ];

    public function tagihan()
    {
        return $this->hasOne('App\Model\Tagihan', 'id', 'id_tagihan');
    }

    public function pelanggan()
    {
        return $this->hasOne('App\Model\Pelanggan', 'id', 'id_pelanggan');
    }

}

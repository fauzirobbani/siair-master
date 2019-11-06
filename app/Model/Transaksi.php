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
        'pembayaran',
        'kembalian',
        'tanggal_transaksi',
        'bulan_transaksi',
        'tahun_transaksi',
    ];
}

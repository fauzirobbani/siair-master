<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $table = 'transaksi';
    public $timestamps = true;

    protected $fillable = [
        'id_pelanggan',
        'meteran_baru',
        'meteran_tagihan',
        'pembayaran',
        'tagihan',
        'kembalian',
        'tanggal',
        'bulan',
        'tahun',
        'status_bayar',

    ];
}

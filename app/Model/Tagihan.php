<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    //
    protected $table = 'tagihan';
    public $timestamps = true;

    protected $fillable = [
        'id_pelanggan',
        'meteran_baru',
        'volume',
        'tagihan',
        'status_bayar',
        'tanggal',
        'bulan',
        'tahun',

    ];

    public function pelanggan()
    {
        return $this->hasOne('App\Model\Pelanggan', 'id', 'id_pelanggan');
    }

    public function transaksi()
    {
        return $this->hasOne('App\Model\transaksi', 'id', 'id_tagihan');
    }
}

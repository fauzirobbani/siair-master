<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    protected $table = 'tagihan';
    public $timestamps = true;

    public function pelanggan()
    {
        return $this->hasOne('App\Pelanggan', 'id', 'id_pelanggan');
    }

    public function transaksi()
    {
        return $this->hasOne('App\Transaksi', 'id', 'id_tagihan');
    }
}

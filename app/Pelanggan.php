<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table = 'pelanggan';
    public $timestamps = true;
    
    protected $fillable = [
        'id_pelanggan',
    ];
}

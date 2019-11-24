<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table = 'pelanggan';
    public $timestamps = true;

    protected $fillable = [
        'rekening','nama','alamat', 'hp', 'meteran',
    ];

    public function users(){
        return $this->hasMany('App\User', 'id', 'rekening');
    }

}

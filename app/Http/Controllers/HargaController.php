<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Harga;

class HargaController extends Controller
{
    //
    public function edit($id)
    {
        //
        $data = Harga::find($id);
        return view('pages.editharga')->with('list', $data);
    }
}

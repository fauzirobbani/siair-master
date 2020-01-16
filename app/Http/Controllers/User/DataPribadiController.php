<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Pelanggan;
use App\User;
use Illuminate\Support\Facades\Auth;

class DataPribadiController extends Controller
{
    //
    public function index()
    {
        //
        $id_user = Auth::id();
        $id_pelanggan = Auth::user()->username;
        // dd($id_user);

        $pelanggan = pelanggan::where('rekening', $id_pelanggan)->first();
        $user = User::where('id', $id_user)->first();


        return view('pages.users.datapribadi.index', compact('pelanggan', 'user'));
    }

    public function edit($id)
    {
        //
        $list = pelanggan::find($id);
        $user = User::where('username', $list->rekening)->first();

        return view('pages.users.datapribadi.edit', compact('user', 'list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request);
        $this->validate($request,[
            'rekening' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'hp' => 'required',
            'email' => 'required',
            ]);
        $data = pelanggan::find($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->hp = $request->hp;
        $data->save();

        $user = User::where('username', $data->rekening)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect('/datapribadi')->with('message','Perubahan Data Berhasil');
    }
}

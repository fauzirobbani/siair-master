<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Model\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected function form()
    {
        return view('pages.admin.user.register');

    }

    protected function formpelanggan()
    {
        return view('pages.admin.user.registerpelanggan');

    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => '1',
        ]);

        return redirect('/pelanggan')->with('message','Tambah Data Berhasil');

    }

    protected function createpelanggan(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => '0',
        ]);

        Pelanggan::create([
            'rekening' => $data['username'],
            'nama' => $data['name'],
            'alamat' => $data['alamat'],
            'hp' => $data['hp'],
            'meteran' => $data['meteran'],
        ]);

        return redirect('/pelanggan')->with('message','Tambah Data Berhasil');

    }
}

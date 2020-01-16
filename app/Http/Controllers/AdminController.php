<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        //
        $show = User::where('status', '1')->get();
        $data = [
            'show' => $show,
        ];
        return view('pages.admin.useradmin.user')->with('list', $data);
    }
}

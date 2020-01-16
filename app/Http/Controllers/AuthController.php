<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request)
  {
  	if(Auth::attempt($request->only('username','password')))
  	{
  		return redirect('/profile');
  	}
  		return redirect('/login');
  }

  public function logout()
  {
  	Auth::logout();
  	return redirect('/home');
  }

//register user
//    public function signupload(Request $request)
//    {
//    	 //validasi data//
//    	 $this->validate($request, [
//    	 		'name'=>
//    	 	'required|string|max:50',
//    	 		'email'=>
//    	 	'required|email|max:100|unique:users,email',
//    	 		'password'=>
//    	 	'required|min:5',
//    	 		'confirm_password'=>
//    	 	'required|same:password'
//    	 	]);

//    	 //save into table
//    	 $user = User::create([
//    	 	'name' => $request->name,
//       'alamat' => $request->alamat,
//       'nohp' => $request->nohp,
//    	 	'email' => $request->email,
//    	 	'password' => bcrypt($request->password)
//    	 	]);

//    	 //autologin
//    	 Auth::LoginUsingId($user->id);

//    	 //redirect to home
//    	 return redirect('/home');
//    }
}

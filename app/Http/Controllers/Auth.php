<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users_model;

class Auth extends Controller
{
	public function login()
	{
		return view('login', ['title' => 'Login']);
	}

	public function prosesLogin(Request $request)
	{
		$request->validate([
			'username' => 'required',
			'password' => 'required',
		]);

		$cekUser = Users_model::where('username', $request->username)->first();

		if($cekUser){
			if(md5($request->password) == $cekUser->password){
				session(['username' => $request->username]);
				session(['level' => $cekUser->level]);
				return redirect('/');
			}else {
				return back()->withInput()->with('pesan',"Invalid password");
			}
		}else{
			return back()->withInput()->with('pesan',"Invalid username");
		}
	}

	public function logout()
	{
	// Hapus session 'username'
		session()->forget('username');
		return redirect('login')->with('pesan','Logout success');
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users_model;
use Illuminate\Support\Facades\DB;

class Users extends Controller
{
	public function index(){
		$users = Users_model::all();
		return view('user.index', ['title' => 'User','detail' => 'Rekapitulasi Data User', 'users' => $users]);
	}

	public function create(){
		return view('user.create', ['title' => 'Form Add Data User', 'detail' => '']);
	}

	public function store(Request $request){

		$validateData = $request->validate([
			'name' => 'required',
			'username' => 'required',
			'email' => 'required',
			'password' => 'required',
			'level' => 'required'
		],
		[
			'name.required' => 'Data must not be empty!',
			'username.required' => 'Data must not be empty!',
			'email.Dequired' => 'Data must not be empty!',
			'password.required' => 'Data must not be empty!',
			'level.required' => 'Data must not be empty!'

		]);

		// Users_model::create($validateData);
		DB::table('users')->insert([
			'name' => $request->name,
			'username' => $request->username,
			'email' => $request->email,
			'password' => md5($request->password),
			'level' => $request->level
		]);

		return redirect()->route('users')->with('add', 'Data added successfully');

	}

	public function edit($id)
	{
		$result = Users_model::find($id);
		return view('user.edit', ['title' => 'Edit Data User', 'detail' => '', 'user' => $result]);
	}

	public function update(Request $request, $id)
	{
		$validateData = $request->validate([
			'name' => 'required',
			'username' => 'required',
			'email' => 'required',
			'level' => 'required'
		],
		[
			'name.required' => 'Data must not be empty!',
			'username.required' => 'Data must not be empty!',
			'email.Dequired' => 'Data must not be empty!',
			'level.required' => 'Data must not be empty!'

		]);

		if($request->input('password') == ''){
		DB::table('users')
		->where('id', $id)
		->update([
			'name' => $request->name,
			'username' => $request->username,
			'email' => $request->email,
			'level' => $request->level
		]);
		} else{
					DB::table('users')
		->where('id', $id)
		->update([
			'name' => $request->name,
			'username' => $request->username,
			'email' => $request->email,
			'password' => md5($request->password),
			'level' => $request->level
		]);
		}

		return redirect()->route('users')
		->with('update', 'Data updated successfully');
	}

	public function destroy($id)
	{
		$delete = Users_model::findOrFail($id);

		$delete->delete();

		return redirect()->route('users')
		->with('delete','Data deleted successfully');

	}
}
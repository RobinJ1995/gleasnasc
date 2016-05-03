<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
	public function store (Request $req)
	{
		$this->validate
		(
			$req,
			[
				'username' => ['required', 'unique:user', 'alpha_dash', 'min:3'],
				'email' => ['required', 'unique:user', 'email'],
				'password' => ['required', 'min:8', 'different:username', 'different:email', 'not_in:password,12345678,00000000']
			]
		);

		$user = new User ();
		$user->username = $req->input ('username');
		$user->email = $req->input ('email');
		$user->password = $req->input ('password'); // Will be hashed by mutator method in User model //

		$user->save ();

		return response ()->json ($user);
	}
}

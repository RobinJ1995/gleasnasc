<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceAttribute;
use App\Models\User;
use GenTux\Jwt\GetsJwtToken;
use GenTux\Jwt\JwtToken;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
	use GetsJwtToken;

	public function authenticate (Request $req, JwtToken $jwt)
	{
		$this->validate
		(
			$req,
			[
				'username' => ['required_without:email', 'exists:user,username'],
				'email' => ['required_without:username', 'exists:user,email'],
				'password' => ['required'],
				'device.title' => ['max:128'],
				'device.identifier' => ['required', 'min:3', 'max:64'],
				'device.attributes' => ['required', 'array', 'min:1'],
				'device.attributes.*' => ['required', 'exists:device_attribute,name']
			]
		);

		$user = NULL;
		if ($req->input ('username', NULL) !== NULL)
			$user = User::where ('username', $req->input ('username'))->firstOrFail ();
		else if ($req->input ('email', NULL) !== NULL)
			$user = User::where ('email', $req->input ('email'))->firstOrFail ();
		else // Shouldn't get reached because of the validator, but just in case... comparing values in PHP can yield strange results sometimes //
			throw new \Exception ('Need either a username or an e-mail address');

		if (! $user->checkPassword ($req->input ('password')))
			throw new \Exception ('Invalid password');

		$attributeNames = $req->input ('device.attributes');
		$attributes = DeviceAttribute::whereIn ('name', $attributeNames)->get ();
		if (count ($attributes) != count ($attributeNames))
			throw new \Exception ('Could not retrieve all the specified device attributes');

		$device = Device::where ('identifier', $req->input ('device.identifier'))->first ();

		if ($device == NULL)
		{
			$device = new Device ();
			$device->title = $req->input('device.title');
			$device->identifier = $req->input('device.identifier');
			$device->user()->associate($user);

			$device->save();

			unset ($device->user); // Don't want to send back the user object twice //
		}
		$device->deviceAttributes ()->detach ();
		$device->deviceAttributes ()->saveMany ($attributes);

		$device->deviceAttributes;
		
		$token = $jwt->createToken ($user);

		foreach ($user->roles as $role)
			$role->permissions;
		foreach ($user->subscriptions as $subscription)
			$subscription->subscriptionType;

		return [
			'user' => $user,
			'device' => $device,
			'token' => $token
		];
	}

	public function show (Request $req)
	{
		$user = User::find ($this->jwtPayload ()['user']['id']);

		$user->roles;
		$user->subscriptions;
		$user->devices;

		return response ()->json ($user);
	}

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

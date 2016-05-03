<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceAttribute;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class DeviceController extends BaseController
{
	public function index (Request $req, int $userId)
	{
		$user = User::findOrFail ($userId);
		$devices = $user->devices;

		foreach ($devices as $device)
			$device->deviceAttributes;

		return response ()->json ($user->devices);
	}

	public function store (Request $req, int $userId)
	{
		$user = User::findOrFail ($userId);

		$this->validate
		(
			$req,
			[
				'title' => ['max:128'],
				'identifier' => ['required', 'unique:device', 'min:3', 'max:64'],
				'attributes' => ['array'],
				'attributes.*' => ['exists:device_attribute,name']
			]
		);

		$attributeNames = $req->input ('attributes');
		$attributes = DeviceAttribute::whereIn ('name', $attributeNames)->get ();
		if (count ($attributes) != count ($attributeNames))
			throw new Exception ('Could not retrieve all the specified attributes');

		$device = new Device ();
		$device->title = $req->input ('title');
		$device->identifier = $req->input ('identifier');
		$device->user ()->associate ($user);

		$device->save ();
		$device->deviceAttributes ()->saveMany ($attributes);

		$device->deviceAttributes; // Don't care about the output, just want it to be filled in before output gets sent //

		return response ()->json ($device);
	}
}

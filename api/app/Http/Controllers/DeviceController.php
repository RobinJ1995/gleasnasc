<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceAttribute;
use App\Models\User;
use GenTux\Jwt\GetsJwtToken;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class DeviceController extends BaseController
{
	use GetsJwtToken;

	public function index (Request $req)
	{
		$devices = Device::where ('user_id', $this->jwtPayload ()['user']['id'])->with ('deviceAttributes')->get ();

		return response ()->json ($devices);
	}

	public function store (Request $req)
	{
		$user = User::findOrFail ($this->jwtPayload ()['user']['id']);

		$this->validate
		(
			$req,
			[
				'title' => ['max:128'],
				'identifier' => ['required', 'unique:device', 'min:3', 'max:64'],
				'attributes' => ['required', 'array', 'min:1'],
				'attributes.*' => ['required', 'exists:device_attribute,name']
			]
		);

		$attributeNames = $req->input ('attributes');
		$attributes = DeviceAttribute::whereIn ('name', $attributeNames)->get ();
		if (count ($attributes) != count ($attributeNames))
			throw new \Exception ('Could not retrieve all the specified attributes');

		$device = new Device ();
		$device->title = $req->input ('title');
		$device->identifier = $req->input ('identifier');
		$device->user ()->associate ($user);

		$device->save ();
		$device->deviceAttributes ()->saveMany ($attributes);

		$device->deviceAttributes; // Don't care about the output, just want it to be filled in before output gets sent //

		return response ()->json ($device);
	}

	public function update (Request $req, int $deviceId)
	{
		$device = Device::findOrFail ($deviceId);

		$this->validate
		(
			$req,
			[
				'title' => ['max:128'],
				'identifier' => ['unique:device', 'min:3', 'max:64'],
				'attributes' => ['array'],
				'attributes.*' => ['exists:device_attribute,name']
			]
		);

		$device->title = $req->input ('title', $device->title);
		$device->identifier = $req->input ('identifier', $device->identifier);

		$device->save ();

		if ($req->input ('attributes') && is_array ($req->input ('attributes')))
		{
			$device->deviceAttributes ()->detach ();

			$attributeNames = $req->input ('attributes');
			$attributes = DeviceAttribute::whereIn ('name', $attributeNames)->get ();
			if (count ($attributes) != count ($attributeNames))
				throw new \Exception ('Could not retrieve all the specified attributes');

			$device->deviceAttributes ()->saveMany ($attributes);
		}

		$device->deviceAttributes; // Don't care about the output, just want it to be filled in before output gets sent //

		return response ()->json ($device);
	}

	public function attributes (Request $req)
	{
		return response ()->json (DeviceAttribute::all ());
	}
}

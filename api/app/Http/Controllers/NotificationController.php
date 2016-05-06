<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Device;
use App\Models\Notification;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class NotificationController extends BaseController
{
	public function show (Request $req, int $deviceId, int $notificationId)
	{
		$notification = Notification::where ('id', $notificationId)->limit (1)->with (['device', 'application', 'deviceNotificationStatus', 'deviceNotificationStatus.device'])->firstOrFail ();

		return response ()->json ($notification);
	}

	public function store (Request $req, int $deviceId)
	{
		$device = Device::find ($deviceId);

		$this->validate
		(
			$req,
			[
				'key' => ['required', 'string', 'max:128', 'unique:notification,key'],
				'post_time' => ['required', 'integer', 'min:' . (time () - (60 * 60 * 24)), 'max:' . (time () + (60 * 60))], // min: 24 hours ago, max: in 1 hour //
				'clearable' => ['boolean'],
				'ongoing' => ['boolean'],
				'application.package_name' => ['required', 'min:3'],
				'application.title' => ['filled']
			]
		);

		$application = Application::where ('package_name', $req->input ('package_name'))->first ();
		if ($application === NULL)
		{
			$application = new Application();
			$application->package_name = $req->input ('application.package_name');
			$application->title = $req->input ('application.title');

			$application->save ();
		}
		if ($application->title == NULL && $req->input ('application.title') != NULL)
		{
			$application->title = $req->input('application.title');

			$application->save ();
		}

		$notification = new Notification ();
		$notification->key = $req->input ('key');
		$notification->post_time = $req->input ('post_time');
		$notification->clearable = $req->input ('clearable');
		$notification->ongoing = $req->input ('clearable');

		$notification->device ()->associate ($device);
		$notification->application ()->associate ($application);

		$notification->save ();

		return response ()->json ($notification);
	}
}

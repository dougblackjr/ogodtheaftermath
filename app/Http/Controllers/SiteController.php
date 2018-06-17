<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Ping;
use Giphy;
use Carbon\Carbon;
use App\Mail\DeadSiteEmail;
use Mail;

class SiteController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		return view('welcome');

	}

	public function create(Request $request)
	{

		$site = Site::create([
			'url' => $request->url
		]);

		return response()->json($site);

	}

	public function ping()
	{

		$sites = Site::all();

		$sites->each(function ($s) {

			$ping = Ping::check($s->url);

			$time = new Carbon();

			$s->up = $ping == 200;

			$s->health = $ping;

			$s->pingedAt = $time->toDateTimeString();

			if(!$s->up) {

				$gif = Giphy::random('dumpsterfire');

				// This UP check will only send email once
				if($s->up) {

					$s->up = FALSE;

					$s->save();

					// Send emergency mail
					Mail::to($request->email)->send(new DeadSiteEmail($s));

				}

				$s->img = $gif->data->image_original_url;

			} else {

				if (!$s->up) {
					$s->up = TRUE;
					$s->save();
				}

			}

			return $s;

		});

		return response()->json($sites);

	}

	public function loader()
	{

		$gif = Giphy::random('help me');

		return $gif->data->image_original_url;

	}
	
}

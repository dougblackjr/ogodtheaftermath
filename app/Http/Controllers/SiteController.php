<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Ping;
use Giphy;
use Carbon\Carbon;

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

			$s->ok = $ping == 200;

			if(!$s->ok) {

				$gif = Giphy::random('dumpsterfire');

				$s->img = $gif->data->image_original_url;
			}

			$s->pingedAt = $time->toDateTimeString();

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

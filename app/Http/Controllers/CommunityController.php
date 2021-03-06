<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Request;

class CommunityController extends Controller
{
	public function join($url)
	{
		$community = Community::where('url', '=', $url)->firstOrFail();

		return view('communities.join2')->with(compact('community'))->with('referrer', Request::server('HTTP_REFERRER'));
	}

	public function login($url)
	{
		$community = Community::where('url', '=', $url)->firstOrFail();

		return view('communities.login')->with(compact('community'));
	}
}

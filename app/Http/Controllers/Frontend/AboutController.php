<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AboutModel;

class AboutController extends Controller
{
	public function getAbout()
	{
		$about = AboutModel::first();
		return view('front-end.about.index', compact('about'));
	}
}

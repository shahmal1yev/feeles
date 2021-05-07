<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
	public function index()
	{
		$banners = [];

		return view('home', compact(
			'banners'
		));
	}

}
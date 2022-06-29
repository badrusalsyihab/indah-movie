<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;

class PageController extends Controller
{
	/*
	page home
	*/
	public function home()
	{
		return view('front.pages.home');
	}

	/*
	page about
	*/
	public function about()
	{
		return view('front.pages.about');
	}

	/*
	page class
	*/
	public function class()
	{
		return view('front.pages.class');
	}

	/*
	page team
	*/
	public function team()
	{
		return view('front.pages.team');
	}

	/*
	page gallery
	*/
	public function gallery()
	{
		return view('front.pages.gallery');
	}

	/*
	page blog
	*/
	public function blog()
	{
		return view('front.pages.blog');
	}

	/*
	page contact
	*/
	public function contact()
	{
		return view('front.pages.contact');
	}
	
}

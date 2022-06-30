<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;

class PageDashboardController extends Controller
{
	/*
	page dashboard
	*/
	public function dashboard()
	{
		return view('admin.pages.dashboard');
	}


    /*
	page list
	*/
	public function list()
	{
		return view('admin.pages.list');
	}


     /*
	page account
	*/
	public function account()
	{
		return view('admin.pages.account');
	}


    /*
	page setting
	*/
	public function setting()
	{
		return view('admin.pages.setting');
	}

	
	
}

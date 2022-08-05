<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;

use App\Models\MasterSponsor;
use App\Models\MasterFilm;
use App\Models\MasterPesertaCasting;
use App\Models\MasterEmployee;



class PageDashboardController extends Controller
{
	/*
	page dashboard
	*/
	public function dashboard()
	{
		$data['total_film'] = MasterFilm::where('statusHapus', 'Aktif')->count();
		$data['total_casting'] = MasterPesertaCasting::where('statusHapus', 'Aktif')->count();
		$data['total_pegawai'] = MasterEmployee::where('statusHapus', 'Aktif')->count();
		$data['total_sponsor'] = MasterSponsor::where('statusHapus', 'Aktif')->count();
	//	dd($data);
		return view('admin.pages.dashboard', $data);
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


	/*
	page login
	*/
	public function login()
	{
		return view('admin.pages.login');
	}
	
	
}

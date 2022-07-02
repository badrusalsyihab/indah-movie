<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
 
use App\Models\MasterPesertaCasting;

class PageDashboardCastingController extends Controller
{
	/*
	page list casting
	*/
	public function index()
	{
       $data['lists'] = MasterPesertaCasting::paginate(12);
		return view('admin.pages.casting', $data);
	}


    /*
	page list casting detail
	*/
	public function detail($id)
	{
        $data['detail'] = MasterPesertaCasting::where('idPeserta', $id)->first()->toArray();
		return view('admin.pages.casting_detail', $data);
	}

    


   
	
	
}

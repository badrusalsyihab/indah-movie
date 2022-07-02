<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
 
use App\Models\MasterSponsor;

class PageDashboardSponsorController extends Controller
{
	/*
	page list sponsor
	*/
	public function index()
	{
       $data['lists'] = MasterSponsor::where('statusHapus', 'Aktif')->paginate(12);
		return view('admin.pages.sponsor', $data);
	}


    /*
	page list sponsor delete
	*/
	public function delete($id)
	{
       $delete = MasterSponsor::where('idSponsor', $id)->update(['statusHapus' => "Non Aktif"]);

       if($delete)
       return redirect(route('adminDashboardSponsor'))->with(['success' => 'Sponsor Berhasil Di Hapus']);

       return redirect(route('adminDashboardSponsor'))->with(['error' => 'Sponsor Gagal Di Hapus']);
		
	}

    

	
}

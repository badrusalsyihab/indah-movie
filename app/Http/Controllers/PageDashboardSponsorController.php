<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
 
use App\Models\MasterSponsor;
use App\Models\TransaksiMjdSponsor;


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
	page list transaction 
	*/
	public function transactionSponsor()
	{
       $data['lists'] = TransaksiMjdSponsor::with(['master_sponsor', 'master_film'])->paginate(12);
	   return view('admin.pages.listTransactionSponsor', $data);
	}


	/*
	page list transaction 
	*/
	public function transactionSponsorSearch(Request $request)
	{
       $eloquent = TransaksiMjdSponsor::with(['master_sponsor', 'master_film']);
	  
	  
		if(!empty($request['nama'])) {
			$eloquent = $eloquent->whereHas('master_sponsor', function($query) use ($request) {
				$query->where('namaSponsor', 'LIKE', '%'.$request['nama'].'%');
		 	});
		}

		if(!empty($request['film'])) {
			$eloquent = $eloquent->whereHas('master_film', function($query) use ($request) {
				$query->where('judulFilm', 'LIKE', '%'.$request['film'].'%');
		 	});
		}

		if(!empty($request['status'])) {
			$eloquent = $eloquent->where("statusTransaksi", $request['status']);
		}
		 

		$data['lists'] = $eloquent->paginate(12);
	  
	
		
	   return view('admin.pages.listTransactionSponsor', $data);
	}


	public function transactionSponsorDetail($id)
	{
		$data['detail'] = TransaksiMjdSponsor::with(['master_sponsor', 'master_film'])->where('idTrxSponsor', $id)->first()->toArray();
		return view('admin.pages.listTransactionDetailSponsor', $data);
	}

	/*
	page list transaction 
	*/
	public function transactionSponsorUpdateStatus(Request $request)
	{
	   $model = TransaksiMjdSponsor::where('idTrxSponsor', $request->get('id'))->first();
	   $model->statusTransaksi = $request->get('status');
	   $model->save();
	   return redirect(route('adminDashboardSponsorTransaction'));

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

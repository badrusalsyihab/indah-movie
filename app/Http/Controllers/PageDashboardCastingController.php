<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
use Redirect;

use App\Models\MasterPesertaCasting;
use App\Models\TransaksiIkutCasting;


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
    

	/*
	page list transaction casting
	*/
	public function transactionCasting()
	{
       $data['lists'] = TransaksiIkutCasting::with(['master_peserta_casting', 'master_film'])->paginate(12);
	   return view('admin.pages.listTransactionCasting', $data);
	}


	/*
	page list transaction casting
	*/
	public function transactionCastingSearch(Request $request)
	{
       $eloquent = TransaksiIkutCasting::with(['master_peserta_casting', 'master_film']);
	  
	  
		if(!empty($request['nama'])) {
			$eloquent = $eloquent->whereHas('master_peserta_casting', function($query) use ($request) {
				$query->where('nama', 'LIKE', '%'.$request['nama'].'%');
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
	  
	
		
	   return view('admin.pages.listTransactionCasting', $data);
	}


	public function transactionCastingDetail($id)
	{
		$data['detail'] = TransaksiIkutCasting::with(['master_peserta_casting', 'master_film'])->where('idTrxCasting', $id)->first()->toArray();
		return view('admin.pages.listTransactionDetail', $data);
	}

	/*
	page list transaction casting
	*/
	public function transactionCastingUpdateStatus(Request $request)
	{
	   $model = TransaksiIkutCasting::where('idTrxCasting', $request->get('id'))->first();
	   $model->statusTransaksi = $request->get('status');
	   $model->save();
	   return redirect(route('adminDashboardCastingTransaction'));

	}
	
   
	
	
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\MasterEmployee;
use App\Models\TransaksiIkutCasting;


class PageDashboardPegawaiController extends Controller
{
	/*
	page list pegawai
	*/
	public function index()
	{
       $data['lists'] = MasterEmployee::where('statusHapus', 'Aktif')->paginate(12);
		return view('admin.pages.pegawai', $data);
	}


    /*
	page list pegawai detail
	*/
	public function detail($id)
	{
        $data['detail'] = MasterEmployee::where('idPeg', $id)->first()->toArray();
		return view('admin.pages.pegawai_detail', $data);
	}


    /*
	page form pegawai
	*/
	public function form()
	{
		return view('admin.pages.pegawaiAdd');
	}


    /*
	page form pegawai delete
	*/
	public function delete($id)
	{
       $delete = MasterEmployee::where('idPeg', $id)->update(['statusHapus' => "Non Aktif"]);

       if($delete)
       return redirect(route('adminDashboardPegawai'))->with(['success' => 'Berhasil Di Hapus']);

       return redirect(route('adminDashboardPegawai'))->with(['error' => 'Gagal Di Hapus']);
		
	}


    /*
	page form pegawai edit
	*/
	public function edit($id)
	{
       $data['edit'] = MasterEmployee::where('idPeg', $id)->first();

       return view('admin.pages.pegawaiEdit', $data);
		
	}


    /*
	page form pegawai
	*/
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validateStore($request));

        if ($validator->fails()) {
            //TODO: case fail
            return redirect(route('adminDashboardPegawaiForm'))->withInput()->withErrors($validator);

        } else {
            //TODO: case pass
           if($request->get('id')){
              $model = MasterEmployee::find($request->get('id'));
           }else{

            $find = MasterEmployee::orderBy('createdAt', 'desc')->first();
            $getId = substr($find->idPeg, 1)+1;
            
            $model = new MasterEmployee;
            $model->idPeg = 'E'.str_pad($getId, 6, 0, STR_PAD_LEFT);

            
           }
           
            $model->nik = $request->nik;
            $model->namaPeg = $request->namaPeg;
           // $model->alamatPeg = $request->alamatPeg;
            $model->phonePeg = $request->phonePeg;
            $model->emailPeg = $request->emailPeg;
            $model->passwordPeg = Hash::make($request->passwordPeg);
            $model->genderPeg = $request->genderPeg;
            $model->statusNikah = $request->statusNikah;
            $model->statusHapus = 'Aktif';
            $model->is_admin = $request->is_admin;
            $model->createdAt = Carbon::now();
            $model->updatedAt = Carbon::now();

            $model->save();
            return redirect(route('adminDashboardPegawai'))->with(['success' => 'Berhasil Di Save']);
        }
    }


    /**
     * Validator 
     * @param $request
     */
    protected function validateStore($request = array())
    {
		$rules = [
            'nik' => 'required',
            'namaPeg' => 'required',
          //  'alamatPeg' => 'required',
            'phonePeg' => 'required',
			'emailPeg' => 'required|email',
            'passwordPeg' => 'required',
            'genderPeg' => 'required',
            'statusNikah' => 'required',
            'is_admin' => 'required',
            
		];

        return $rules;
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

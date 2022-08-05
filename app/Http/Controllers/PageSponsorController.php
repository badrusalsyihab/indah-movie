<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\MasterSponsor;
use App\Models\TransaksiMjdSponsor;
use App\Models\MasterFilm;
use DB;

use Mail;
use App\Mail\NotifyCastingMail;


class PageSponsorController extends Controller
{
	protected $lastInsertId;
	protected $uniqueIdImagePrefix = 'sponsor';
	const PREFIX_IMAGE_NAME = 'sponsor_images';

    

	/*
	page 
	*/
	public function sponsor()
	{
		$data['lists'] = MasterFilm::with(['master_genre_film', 'master_kategori_film'])->where('statusHapus', 'Aktif')->get()->toArray();
		return view('front.pages.sponsor', $data);
	}

	/*
	page form 
	*/
	public function formSponsor()
	{
		$data['lists'] = MasterFilm::with(['master_genre_film', 'master_kategori_film'])->where('statusHapus', 'Aktif')->get()->toArray();
		return view('front.pages.formSponsor', $data);
	}


	/*
	page form post 
	*/
	public function formPostSponsor(Request $request)
	{
		$validator = Validator::make($request->all(), $this->validateStore($request));

        if ($validator->fails()) {
            //TODO: case fail
            return redirect(route('frontSponsorSignUp'))->withInput($request->all())->withErrors($validator);
        } else {
            //TODO: case pass
			DB::beginTransaction();
			if(!$this->storeToMaterSponsor($request->all()))
            {
                DB::rollBack();
                return redirect(route('frontSponsorSignUp'));
            }
           
            
			DB::commit();
            return redirect(route('frontSponsorSignUp'))->with(['success' => 'Register Success..']);
        }

	}


	protected function storeToMaterSponsor($data)
	{
		try {
           
			$model = new MasterSponsor;

            $find = MasterSponsor::orderBy('idSponsor', 'desc')->first();
            $getId = substr($find->idSponsor, 1)+1;

            $model->idSponsor = 'S'.str_pad($getId, 6, 0, STR_PAD_LEFT);
            $model->emailSponsor = $data['emailSponsor'];
            $model->namaSponsor = $data['namaSponsor'];
            $model->passwordSponsor = Hash::make($data['passwordSponsor']);
			$model->nik = $data['nik'];
			$model->npwp = $data['npwp'];
			$model->alamatSponsor = $data['alamatSponsor'];
			$model->phoneSponsor = $data['phoneSponsor'];
            $model->createdAt = Carbon::now();
            $model->updatedAt = Carbon::now();
			return $model->save();
            
		} catch (\Exception $e) {
            dd($e);
            return false;
        }
	}


    /*
	page storeToTransaction
	*/
    public function storeToTransactionSponsor(Request $request)
	{
		try {

            $validator = Validator::make($request->all(), $this->validateStoreFormSponsor($request));

            if ($validator->fails()) {
                //TODO: case fail
                return redirect(route('frontSponsorForm'))->withInput($request->all())->withErrors($validator);
            } else {

                DB::beginTransaction();
               
                if(!$this->storetoDbTrans($request->all()))
                {
                    DB::rollBack();
                    return redirect(route('frontSponsorForm'));
                }

                if (!$this->uploadBukti($request->all())) {
                    DB::rollBack();
                    return redirect(route('frontSponsorForm'));
                }

                // if (!$this->sendMailCasting($request->all())) {
                //     DB::rollBack();
                //     return redirect(route('frontSponsorForm'));
                // }

                DB::commit();
                return redirect(route('frontSponsorForm'))->with(['success' => 'Submit Success..']);

            }
        } catch (\Exception $e) {
            return false;
        }
	}


    protected function storetoDbTrans($data)
    {
        $modelMaster = MasterSponsor::where('emailSponsor', $data['emailSponsor'])->first();
        $modelTrans = new TransaksiMjdSponsor;
       
        $lastorderId = $modelTrans::max('idTrxSponsor') ?? 1;
        $lastIncreament = substr($lastorderId, -4);
        $format = 'SPO' . date('Ymd') . str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);
        
        $modelTrans->idTrxSponsor = $format;
        $modelTrans->idSponsor = $modelMaster->idSponsor;
        $modelTrans->idFilm = $data['idFilm'];
        $modelTrans->statusTransaksi = 'Menunggu';
        $modelTrans->alasanTransaksi = $data['alasanTransaksi'];
        $modelTrans->donasiSponsor = filter_var($data['donasiSponsor'], FILTER_SANITIZE_NUMBER_INT);
        $modelTrans->fotoBukti = $this->uniqueIdImagePrefix . '_' .$data['fotoBukti']->getClientOriginalName(); 
        $modelTrans->createdAt = Carbon::now();
        $modelTrans->updatedAt = Carbon::now();
        return $modelTrans->save();

    }


	 /**
     * Upload upload
     * @param $data
     * @return true
     */
    protected function uploadBukti($data)
    {
        try {

            if (isset($data['fotoBukti']) && !empty($data['fotoBukti']))
            {
                if ($data['fotoBukti']->isValid()) {
                    $filename = $this->uniqueIdImagePrefix . '_' .$data['fotoBukti']->getClientOriginalName();

                    if (! $data['fotoBukti']->move('./asset_sponsor', $filename)) {
                        return false;
                    }

                    return true;

                } else {
                    return false;
                }
            }

            return true;

        } catch (\Exception $e) {
            return false;
        }
    }


	 /**
     * Validator post 
     * @param $request
     */
    protected function validateStore($request = array())
    {
		$rules = [
            'nik' => 'required',
            'npwp' => 'required',
            'namaSponsor' => 'required',
            'alamatSponsor' => 'required',
            'phoneSponsor' => 'required|numeric',
            'emailSponsor' => 'required|email|unique:master_sponsor',
            'passwordSponsor' => 'required',
		];

        return $rules;
    }


    /**
     * Validator post 
     * @param $request
     */
    protected function validateStoreFormSponsor($request = array())
    {
		$rules = [
            'idFilm' => 'required',
            'emailSponsor' => 'required',
            'donasiSponsor' => 'required',
            'fotoBukti' => 'required',
          //  'alasanTransaksi' => 'required',
		];

        return $rules;
    }


    /**
     * send mail post 
     * @param $request
     */
    protected function sendMail($data)
    {
        try {
            $details = [
                'title' => 'Mail from '.$data['email'],
                'body' => 'This is for testing email using smtp'
            ];

            $mail = Mail::to('badrusalsyihab@gmail.com')->send(new NotifyCastingMail($details));

            if (Mail::failures()) {
                return false;
            }else{
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
    } 


	
}

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
use App\Models\MasterPesertaCasting;
use App\Models\TransaksiIkutCasting;
use App\Models\MasterFilm;
use DB;

class PageCastingController extends Controller
{
	protected $lastInsertId;
	protected $uniqueIdImagePrefix = 'casting';
	const PREFIX_IMAGE_NAME = 'casting_images';

    

	/*
	page casting
	*/
	public function casting()
	{
		$data['lists'] = MasterFilm::with(['master_genre_film', 'master_kategori_film'])->where('statusHapus', 'Aktif')->get()->toArray();
	//	dd($data);
		return view('front.pages.casting', $data);
	}

	/*
	page form Casting
	*/
	public function formCasting()
	{
		$data['lists'] = MasterFilm::with(['master_genre_film', 'master_kategori_film'])->where('statusHapus', 'Aktif')->get()->toArray();
		return view('front.pages.formCasting', $data);
	}


	/*
	page form post Casting
	*/
	public function formPostCasting(Request $request)
	{
		$validator = Validator::make($request->all(), $this->validateStore($request));

        if ($validator->fails()) {
            //TODO: case fail
            return redirect(route('frontSignUp'))->withInput($request->all())->withErrors($validator);
        } else {
            //TODO: case pass
			DB::beginTransaction();
			if(!$this->storeToMaterCasting($request->all()))
            {
                DB::rollBack();
                return redirect(route('frontSignUp'));
            }
            if (!$this->uploadImagesKtp($request->all())) {
                DB::rollBack();
                return redirect(route('frontSignUp'));
            }
            if (!$this->uploadImagesFotoGrid($request->all())) {
                DB::rollBack();
                return redirect(route('frontSignUp'));
            }
            if (!$this->uploadImagesFileBiodata($request->all())) {
                DB::rollBack();
                return redirect(route('frontSignUp'));
            }

			DB::commit();
            return redirect(route('frontSignUp'))->with(['success' => 'Register Success..']);
        }

	}


	protected function storeToMaterCasting($data)
	{
		try {

			$model = new MasterPesertaCasting;
            $model->idPeserta = $model::max('idPeserta')+1;
            $model->email = $data['email'];
            $model->nama = $data['nama'];
            $model->password = Hash::make($data['password']);
			$model->nik = $data['nik'];
			$model->npwp = $data['npwp'];
			$model->alamat = $data['alamat'];
			$model->phone = $data['phone'];
			$model->gender = $data['gender'];
			$model->tempatLahir = $data['tempatLahir'];
			$model->tglLahir = $data['tglLahir'];
            $model->statusHapus = 'Aktif';
			$model->fileKTP = $this->uniqueIdImagePrefix . '_' .$data['fileKTP']->getClientOriginalName(); 
			$model->fileBiodata = $this->uniqueIdImagePrefix . '_' .$data['fileBiodata']->getClientOriginalName();
			$model->fotoGrid = $this->uniqueIdImagePrefix . '_' .$data['fotoGrid']->getClientOriginalName();
			$model->linkVideoProfil = $data['linkVideoProfil'];
			$model->linkVideoAkting = $data['linkVideoAkting'];
			$model->linkVideoProfil = $data['linkVideoProfil'];
			$model->linkInstagram = $data['linkInstagram'];
            $model->createdAt = Carbon::now();
            $model->updatedAt = Carbon::now();
			return $model->save();
            
		} catch (\Exception $e) {
            return false;
        }
	}


    /*
	page storeToTransactionCasting
	*/
    public function storeToTransactionCasting(Request $request)
	{
		try {

            $validator = Validator::make($request->all(), $this->validateStoreFormCasting($request));

            if ($validator->fails()) {
                //TODO: case fail
                return redirect(route('frontCastingForm'))->withInput($request->all())->withErrors($validator);
            } else {

                $modelMaster = MasterPesertaCasting::where('email', $request->get('email'))->first();
                $modelTrans = new TransaksiIkutCasting;
               
                $lastorderId = $modelTrans::max('idTrxCasting') ?? 1;
                $lastIncreament = substr($lastorderId, -4);
                $format = 'CAS' . date('Ymd') . str_pad($lastIncreament + 1, 4, 0, STR_PAD_LEFT);

                $modelTrans->idTrxCasting = $format;
                $modelTrans->idPeserta = $modelMaster->idPeserta;
                $modelTrans->idFilm = $request->get('idFilm');
                $modelTrans->statusTransaksi = 'Menunggu';
                $modelTrans->pengajuanKarakter = $request->get('pengajuanKarakter');
                $modelTrans->createdAt = Carbon::now();
                $modelTrans->updatedAt = Carbon::now();
                $modelTrans->save();
                return redirect(route('frontCastingForm'))->with(['success' => 'Submit Success..']);

            }
        } catch (\Exception $e) {
            return false;
        }
	}


	 /**
     * Upload uploadImagesKtp
     * @param $data
     * @return true
     */
    protected function uploadImagesKtp($data)
    {
        try {

            if (isset($data['fileKTP']) && !empty($data['fileKTP']))
            {
                if ($data['fileKTP']->isValid()) {
                    $filename = $this->uniqueIdImagePrefix . '_' .$data['fileKTP']->getClientOriginalName();

                    if (! $data['fileKTP']->move('./asset_casting', $filename)) {
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
     * Upload fileBiodata
     * @param $data
     * @return true
     */
    protected function uploadImagesFileBiodata($data)
    {
        try {

            if (isset($data['fileBiodata']) && !empty($data['fileBiodata']))
            {
                if ($data['fileBiodata']->isValid()) {

                    $filename = $this->uniqueIdImagePrefix . '_' .$data['fileBiodata']->getClientOriginalName();

                    if (! $data['fileBiodata']->move('./asset_casting', $filename)) {
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
     * Upload fotoGrid
     * @param $data
     * @return true
     */
    protected function uploadImagesFotoGrid($data)
    {
        try {

            if (isset($data['fotoGrid']) && !empty($data['fotoGrid']))
            {
                if ($data['fotoGrid']->isValid()) {

                    $filename = $this->uniqueIdImagePrefix . '_' .$data['fotoGrid']->getClientOriginalName();

                    if (!$data['fotoGrid']->move('./asset_casting', $filename)) {
                       
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
     * Validator post casting
     * @param $request
     */
    protected function validateStore($request = array())
    {
		$rules = [
		//	'idFilm' => 'required',
            'nik' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'npwp' => 'required',
			'gender' => 'required',
            'tempatLahir' => 'required',
            'tglLahir' => 'required',
			'email' => 'required',
            'phone' => 'required|numeric',
			'linkVideoAkting' => 'required|url',
            'linkVideoProfil' => 'required|url',
            'linkInstagram' => 'required|url',
			'tglLahir' => 'required',
            //'fileKTP' => 'required|image',
            //'fileBiodata' => 'required|mimes:pdf|max:10000',
			//'fotoGrid' => 'required|image',
            'alamat' => 'required',
		];

        return $rules;
    }


    /**
     * Validator post casting
     * @param $request
     */
    protected function validateStoreFormCasting($request = array())
    {
		$rules = [
            'idFilm' => 'required',
            'email' => 'required',
            'pengajuanKarakter' => 'required',
		];

        return $rules;
    }





	
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\MasterEmployee;

class PagePegawaiAuthController extends Controller
{
	/*
	page form login
	*/
	public function login()
	{
		return view('front.pages.login_pegawai');
	}

	/*
	page form signUp
	*/
	public function signUp()
	{
		return view('front.pages.signUp_pegawai');
	}


    /*
	store form login
	*/
    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $validator = Validator::make($request->all(), $this->validateStore($request));
        if ($validator->fails()) {
            //TODO: case fail
            return redirect(route('frontLogin'))->withInput($request->all())->withErrors($validator);
        } else {
            $model = MasterEmployee::query()->where('emailPeg', $request->get('email'))->first();

            if(!$model)
                return back()->with('error', 'Email or password is incorrect');
            

            if (!Hash::check($request->get('password'), $model->passwordPeg)) 
                return back()->with('error', 'Email or password is incorrect');
            

            Auth::guard('pegawai')->login($model);
            return redirect(route('adminDashboard'));
        }
       
    }


     /**
     * Validator logim
     * @param $request
     */
    protected function validateStore($request = array())
    {
		$rules = [
            'password' => 'required',
            'email' => 'required',
		];

        return $rules;
    }
 

    /*
	store form logout
	*/
    public function logout(Request $request)
    {
        Auth::guard('pegawai')->logout();
        Session::flush();
        return redirect(route('frontPegawaiLogin'));
    }



	
}
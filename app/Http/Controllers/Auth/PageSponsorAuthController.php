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
use App\Models\MasterSponsor;

class PageSponsorAuthController extends Controller
{
	/*
	page form login
	*/
	public function login()
	{
		return view('front.pages.loginSponsor');
	}

	/*
	page form signUp
	*/
	public function signUp()
	{
		return view('front.pages.signUpSponsor');
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
            return redirect(route('frontSponsorLogin'))->withInput($request->all())->withErrors($validator);
        } else {
            $model = MasterSponsor::query()->where('emailSponsor', $request->get('email'))->first();

            if(!$model)
                return back()->with('error', 'Email or password is incorrect');
            

            if (!Hash::check($request->get('password'), $model->passwordSponsor)) 
                return back()->with('error', 'Email or password is incorrect');
            

            Auth::guard('sponsor')->login($model);
            return redirect(route('frontSponsor'));
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
        Auth::guard('sponsor')->logout();
        Session::flush();
        return redirect(route('frontSponsorLogin'));
    }



	
}
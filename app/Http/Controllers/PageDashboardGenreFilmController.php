<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
 
use App\Models\MasterGenreFilm;

class PageDashboardGenreFilmController extends Controller
{
	/*
	page list genre film
	*/
	public function index()
	{
       $data['lists'] = MasterGenreFilm::where('statusHapus', 'Aktif')->paginate(12);
		return view('admin.pages.genreFilm', $data);
	}


    /*
	page form genre film
	*/
	public function form()
	{
		return view('admin.pages.genreFilmAdd');
	}


    /*
	page form genre film delete
	*/
	public function delete($id)
	{
       $delete = MasterGenreFilm::where('idGenre', $id)->update(['statusHapus' => "Non Aktif"]);

       if($delete)
       return redirect(route('adminDashboardGenreFilm'))->with(['success' => 'Genre Berhasil Di Hapus']);

       return redirect(route('adminDashboardGenreFilm'))->with(['error' => 'Genre Gagal Di Hapus']);
		
	}


    /*
	page form genre film edit
	*/
	public function edit($id)
	{
       $data['edit'] = MasterGenreFilm::where('idGenre', $id)->first();

       return view('admin.pages.genreFilmEdit', $data);
		
	}


    /*
	page form genre film store
	*/
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validateStore($request));

        if ($validator->fails()) {
            //TODO: case fail
            return redirect(route('adminDashboardGenreForm'))->withInput()->withErrors($validator);

        } else {
            //TODO: case pass
           if($request->get('id')){
            $model = MasterGenreFilm::find($request->get('id'));
           }else{
            $model = new MasterGenreFilm;

            $find = MasterGenreFilm::orderBy('createdAt', 'desc')->first();

            $getId = substr($find->idGenre, 1)+1;

            $model->idGenre = 'G'.str_pad($getId, 6, 0, STR_PAD_LEFT);
           
            $model->statusHapus = 'Aktif';
           }
           
            $model->namaGenre = $request->name;
            $model->createdAt = Carbon::now();
            $model->updatedAt = Carbon::now();
            $model->save();
            return redirect(route('adminDashboardGenreFilm'))->with(['success' => 'Genre Berhasil Di Save']);
        }
    }


    /**
     * Validator Sponsors
     * @param $request
     */
    protected function validateStore($request = array())
    {
		$rules = [
			'name'       => 'required',
		];

        return $rules;
    }



    

	
}

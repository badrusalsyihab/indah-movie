<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Validator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use GuzzleHttp\Client;
 
use App\Models\MasterKategoriFilm;

class PageDashboardCategoryFilmController extends Controller
{
	/*
	page list kategori film
	*/
	public function index()
	{
       $data['lists'] = MasterKategoriFilm::where('statusHapus', 'Aktif')->paginate(12);
		return view('admin.pages.categoryFilm', $data);
	}


    /*
	page form kategori film
	*/
	public function form()
	{
		return view('admin.pages.categoryFilmAdd');
	}


    /*
	page form kategori film delete
	*/
	public function delete($id)
	{
       $delete = MasterKategoriFilm::where('idKategori', $id)->update(['statusHapus' => "Non Aktif"]);

       if($delete)
       return redirect(route('adminDashboardCategoryFilm'))->with(['success' => 'Category Berhasil Di Hapus']);

       return redirect(route('adminDashboardCategoryFilm'))->with(['error' => 'Category Gagal Di Hapus']);
		
	}


    /*
	page form kategori film edit
	*/
	public function edit($id)
	{
       $data['edit'] = MasterKategoriFilm::where('idKategori', $id)->first();

       return view('admin.pages.categoryFilmEdit', $data);
		
	}


    /*
	page form kategori film store
	*/
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->validateStore($request));

        if ($validator->fails()) {
            //TODO: case fail
            return redirect(route('adminDashboardCategoryForm'))->withInput()->withErrors($validator);

        } else {
            //TODO: case pass
           if($request->get('id')){
            $model = MasterKategoriFilm::find($request->get('id'));
           }else{
            $model = new MasterKategoriFilm;

            $find = MasterKategoriFilm::orderBy('createdAt', 'desc')->first();

            $getId = substr($find->idKategori, 1)+1;
            
            $model->idKategori = 'K'.str_pad($getId, 6, 0, STR_PAD_LEFT);
            
            $model->statusHapus = 'Aktif';
           }
           
            $model->namaKategori = $request->name;
            $model->createdAt = Carbon::now();
            $model->updatedAt = Carbon::now();
            $model->save();
            return redirect(route('adminDashboardCategoryFilm'))->with(['success' => 'Category Berhasil Di Save']);
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

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
*Start Route HTML 
*/
Route::get('/about', 'App\Http\Controllers\PageController@about')->name('frontAbout');
Route::get('/team', 'App\Http\Controllers\PageController@team')->name('frontTeam');
Route::get('/gallery', 'App\Http\Controllers\PageController@gallery')->name('frontGallery');
Route::get('/blog', 'App\Http\Controllers\PageController@blog')->name('frontBlog');
Route::get('/contact', 'App\Http\Controllers\PageController@contact')->name('frontContact');
/*
*End Route HTML 
*/


Route::get('/', 'App\Http\Controllers\PageController@home')->name('frontHome');
Route::get('/login', 'App\Http\Controllers\Auth\PageAuthController@login')->name('frontLogin');
Route::get('/logout', 'App\Http\Controllers\Auth\PageAuthController@logout')->name('frontLogout');

Route::get('/sign-up', 'App\Http\Controllers\Auth\PageAuthController@signUp')->name('frontSignUp');
Route::post('/login-store', 'App\Http\Controllers\Auth\PageAuthController@loginStore')->name('frontLoginStore');


Route::post('/signup-casting-store', 'App\Http\Controllers\PageCastingController@formPostCasting')->name('frontSignUpCastingStore');
Route::get('/casting', 'App\Http\Controllers\PageCastingController@casting')->name('frontCasting');
Route::group(['prefix' => 'casting', 'middleware' => 'casting'], function () {
    Route::get('/form', 'App\Http\Controllers\PageCastingController@formCasting')->name('frontCastingForm');
    Route::post('/form-post', 'App\Http\Controllers\PageCastingController@formPostCasting')->name('frontCastingFormPost');
    Route::post('/form-post-film', 'App\Http\Controllers\PageCastingController@storeToTransactionCasting')->name('frontCastingFormPostFilm');
    
});


Route::get('/login-pegawai', 'App\Http\Controllers\Auth\PagePegawaiAuthController@login')->name('frontPegawaiLogin');
Route::get('/logout-pegawai', 'App\Http\Controllers\Auth\PagePegawaiAuthController@logout')->name('frontPegawaiLogout');
Route::post('/login-pegawai-store', 'App\Http\Controllers\Auth\PagePegawaiAuthController@loginStore')->name('frontPegawaiLoginStore');

Route::group(['prefix' => 'dashboard', 'middleware' => 'pegawai'], function () {
    Route::get('/', 'App\Http\Controllers\PageDashboardController@dashboard')->name('adminDashboard');
    Route::get('/login', 'App\Http\Controllers\PageDashboardController@login')->name('adminDashboardLogin');
    Route::get('/list', 'App\Http\Controllers\PageDashboardController@list')->name('adminDashboardList');
    Route::get('/account', 'App\Http\Controllers\PageDashboardController@account')->name('adminDashboardAccount');
    Route::get('/setting', 'App\Http\Controllers\PageDashboardController@setting')->name('adminDashboardSetting');


    Route::get('/pegawai', 'App\Http\Controllers\PageDashboardPegawaiController@index')->name('adminDashboardPegawai');
    Route::get('/pegawai/{id}', 'App\Http\Controllers\PageDashboardPegawaiController@detail')->name('adminDashboardPegawaiDetail');
    Route::get('/pegawai-form', 'App\Http\Controllers\PageDashboardPegawaiController@form')->name('adminDashboardPegawaiForm');
    Route::get('/pegawai-delete/{id}', 'App\Http\Controllers\PageDashboardPegawaiController@delete')->name('adminDashboardPegawaiDelete');
    Route::post('/pegawai-store', 'App\Http\Controllers\PageDashboardPegawaiController@store')->name('adminDashboardPegawaiStore');
    Route::get('/pegawai-edit/{id}', 'App\Http\Controllers\PageDashboardPegawaiController@edit')->name('adminDashboardPegawaiEdit');

    Route::get('/casting', 'App\Http\Controllers\PageDashboardCastingController@index')->name('adminDashboardCasting');
    Route::get('/casting/{id}', 'App\Http\Controllers\PageDashboardCastingController@detail')->name('adminDashboardCastingDetail');

    
    Route::get('/list-ikut-casting', 'App\Http\Controllers\PageDashboardCastingController@transactionCasting')->name('adminDashboardCastingTransaction');
    Route::get('/list-ikut-casting/{id}', 'App\Http\Controllers\PageDashboardCastingController@transactionCastingDetail')->name('adminDashboardCastingDetailTransaction');
    Route::post('/list-update-status-casting', 'App\Http\Controllers\PageDashboardCastingController@transactionCastingUpdateStatus')->name('adminDashboardCastingUpdateStatus');
    Route::post('/list-ikut-casting-search', 'App\Http\Controllers\PageDashboardCastingController@transactionCastingSearch')->name('adminDashboardCastingTransactionSearch');

    Route::get('/sponsor', 'App\Http\Controllers\PageDashboardSponsorController@index')->name('adminDashboardSponsor');
    Route::get('/sponsor-delete/{id}', 'App\Http\Controllers\PageDashboardSponsorController@delete')->name('adminDashboardSponsorDelete');


    Route::get('/category-film', 'App\Http\Controllers\PageDashboardCategoryFilmController@index')->name('adminDashboardCategoryFilm');
    Route::get('/category-film-form', 'App\Http\Controllers\PageDashboardCategoryFilmController@form')->name('adminDashboardCategoryForm');
    Route::get('/category-film-delete/{id}', 'App\Http\Controllers\PageDashboardCategoryFilmController@delete')->name('adminDashboardCategoryFilmDelete');
    Route::post('/category-film-store', 'App\Http\Controllers\PageDashboardCategoryFilmController@store')->name('adminDashboardCategoryFilmStore');
    Route::get('/category-film-edit/{id}', 'App\Http\Controllers\PageDashboardCategoryFilmController@edit')->name('adminDashboardCategoryFilmEdit');


    Route::get('/genre-film', 'App\Http\Controllers\PageDashboardGenreFilmController@index')->name('adminDashboardGenreFilm');
    Route::get('/genre-film-form', 'App\Http\Controllers\PageDashboardGenreFilmController@form')->name('adminDashboardGenreForm');
    Route::get('/genre-film-delete/{id}', 'App\Http\Controllers\PageDashboardGenreFilmController@delete')->name('adminDashboardGenreFilmDelete');
    Route::post('/genre-film-store', 'App\Http\Controllers\PageDashboardGenreFilmController@store')->name('adminDashboardGenreFilmStore');
    Route::get('/genre-film-edit/{id}', 'App\Http\Controllers\PageDashboardGenreFilmController@edit')->name('adminDashboardGenreFilmEdit');

    Route::get('/film', 'App\Http\Controllers\PageDashboardFilmController@index')->name('adminDashboardFilm');
    Route::get('/film-form', 'App\Http\Controllers\PageDashboardFilmController@form')->name('adminDashboardForm');
    Route::get('/film-delete/{id}', 'App\Http\Controllers\PageDashboardFilmController@delete')->name('adminDashboardFilmDelete');
    Route::post('/film-store', 'App\Http\Controllers\PageDashboardFilmController@store')->name('adminDashboardFilmStore'); 
    Route::get('/film-edit/{id}', 'App\Http\Controllers\PageDashboardFilmController@edit')->name('adminDashboardFilmEdit');
});
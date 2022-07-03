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

Route::get('/', 'App\Http\Controllers\PageController@home')->name('frontHome');
Route::get('/about', 'App\Http\Controllers\PageController@about')->name('frontAbout');
Route::get('/class', 'App\Http\Controllers\PageController@class')->name('frontClass');
Route::get('/team', 'App\Http\Controllers\PageController@team')->name('frontTeam');
Route::get('/gallery', 'App\Http\Controllers\PageController@gallery')->name('frontGallery');
Route::get('/blog', 'App\Http\Controllers\PageController@blog')->name('frontBlog');
Route::get('/contact', 'App\Http\Controllers\PageController@contact')->name('frontContact');


Route::get('/dashboard', 'App\Http\Controllers\PageDashboardController@dashboard')->name('adminDashboard');
Route::get('/dashboard/login', 'App\Http\Controllers\PageDashboardController@login')->name('adminDashboardLogin');
Route::get('/dashboard-list', 'App\Http\Controllers\PageDashboardController@list')->name('adminDashboardList');
Route::get('/dashboard-account', 'App\Http\Controllers\PageDashboardController@account')->name('adminDashboardAccount');
Route::get('/dashboard-setting', 'App\Http\Controllers\PageDashboardController@setting')->name('adminDashboardSetting');


Route::get('/dashboard-casting', 'App\Http\Controllers\PageDashboardCastingController@index')->name('adminDashboardCasting');
Route::get('/dashboard-casting/{id}', 'App\Http\Controllers\PageDashboardCastingController@detail')->name('adminDashboardCastingDetail');

Route::get('/dashboard-sponsor', 'App\Http\Controllers\PageDashboardSponsorController@index')->name('adminDashboardSponsor');
Route::get('/dashboard-sponsor-delete/{id}', 'App\Http\Controllers\PageDashboardSponsorController@delete')->name('adminDashboardSponsorDelete');


Route::get('/dashboard-category-film', 'App\Http\Controllers\PageDashboardCategoryFilmController@index')->name('adminDashboardCategoryFilm');
Route::get('/dashboard-category-film-form', 'App\Http\Controllers\PageDashboardCategoryFilmController@form')->name('adminDashboardCategoryForm');
Route::get('/dashboard-category-film-delete/{id}', 'App\Http\Controllers\PageDashboardCategoryFilmController@delete')->name('adminDashboardCategoryFilmDelete');
Route::post('/dashboard-category-film-store', 'App\Http\Controllers\PageDashboardCategoryFilmController@store')->name('adminDashboardCategoryFilmStore');
Route::get('/dashboard-category-film-edit/{id}', 'App\Http\Controllers\PageDashboardCategoryFilmController@edit')->name('adminDashboardCategoryFilmEdit');


Route::get('/dashboard-genre-film', 'App\Http\Controllers\PageDashboardGenreFilmController@index')->name('adminDashboardGenreFilm');
Route::get('/dashboard-genre-film-form', 'App\Http\Controllers\PageDashboardGenreFilmController@form')->name('adminDashboardGenreForm');
Route::get('/dashboard-genre-film-delete/{id}', 'App\Http\Controllers\PageDashboardGenreFilmController@delete')->name('adminDashboardGenreFilmDelete');
Route::post('/dashboard-genre-film-store', 'App\Http\Controllers\PageDashboardGenreFilmController@store')->name('adminDashboardGenreFilmStore');
Route::get('/dashboard-genre-film-edit/{id}', 'App\Http\Controllers\PageDashboardGenreFilmController@edit')->name('adminDashboardGenreFilmEdit');
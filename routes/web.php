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
Route::get('/dashboard-list', 'App\Http\Controllers\PageDashboardController@list')->name('adminDashboardList');
Route::get('/dashboard-account', 'App\Http\Controllers\PageDashboardController@account')->name('adminDashboardAccount');
Route::get('/dashboard-setting', 'App\Http\Controllers\PageDashboardController@setting')->name('adminDashboardSetting');

// Route::get('/', function () {
//     return view('welcome');
// });

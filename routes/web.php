<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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


Route::group(['namespace' => 'Backend', 'middleware' => 'auth'], function(){
    Route::get('admin','DashboardAdmin@admin')->name('admin');
    Route::get('coach','DashboardAdmin@coach')->name('coach');
    Route::resource('player','PlayerController');
    Route::resource('datagame','DataGameController');
    Route::resource('dataplayer','DataPlayerController');
    Route::resource('datacoach','DataCoachController');
    Route::resource('datajadwal','DataJadwalController');
    Route::resource('dataevent','DataEventController');
    Route::resource('datateam','DataTeamController');
    Route::resource('detailteam','DetailTeamController');
    Route::put('datacoach/nonactive/{datacoach}','DataCoachController@nonactive')->name('datacoach.nonactive');
    Route::put('datacoach/active/{datacoach}','DataCoachController@active')->name('datacoach.active');
    Route::put('dataplayer/nonactive/{dataplayer}','DataPlayerController@nonactive')->name('dataplayer.nonactive');
    Route::put('dataplayer/active/{dataplayer}','DataPlayerController@active')->name('dataplayer.active');
    Route::put('player/nonactive/{player}','PlayerController@nonactive')->name('player.nonactive');
    Route::put('player/active/{player}','PlayerController@active')->name('player.active');
});

Route::group(['namespace' => 'Frontend'], function(){
    Route::get('/','HomepageController@index');
});

// Route::group(['middleware' => ['auth']], function (){
//     Route::group(['middleware' => ['cek_login:admin']], function (){
//         Route::get('admin','Backend\DashboardAdmin@admin');
//     });
//     Route::group(['middleware' => ['cek_login:coach']], function (){
//         Route::get('coach','Backend\DashboardAdmin@coach');
//     });
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

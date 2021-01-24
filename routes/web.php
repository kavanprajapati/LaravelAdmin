<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $user_type = Auth::user()->user_type;
    if ($user_type == '1') {
        return redirect(route('admin.home'));
    } else {
        return redirect(route('login'));
    }
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {

        Route::get('/home', 'HomeController@index')->name('home');

        //members routes
        Route::resource('members', 'MemberController');

        //settings routes
        Route::get('settings', 'SettingController@edit')->name('settings');
        Route::post('settings', 'SettingController@update')->name('settings');
    });
});

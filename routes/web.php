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

        //Admin profile routes
        Route::get('profile/{id}', 'AdminController@show')->name('profile');
        Route::get('editprofile/{id}', 'AdminController@edit')->name('editprofile');
        Route::post('updateprofile', 'AdminController@update')->name('updateprofile');
        Route::post('changeimage', 'AdminController@changeImage')->name('changeimage');


        //members routes
        Route::resource('members', 'MemberController');
        Route::get('membersdata', 'MemberController@view')->name('members.data');
        Route::post('members/Active', 'MemberController@Active')->name('members.Active');
        Route::post('members/Inactive', 'MemberController@Inactive')->name('members.Inactive');
        Route::post('members/deleteAll', 'MemberController@deleteAll')->name('members.deleteAll');




        //settings routes
        Route::get('settings/show', 'SettingController@show')->name('settings.show');
        Route::get('settings', 'SettingController@edit')->name('settings.edit');
        Route::post('settings', 'SettingController@update')->name('settings');
    });
});

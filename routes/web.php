<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class, 'index'])->name('welcome');
Auth::routes();

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['namespace' => 'Information'], function () {
        Route::group(['prefix' => 'video'], function(){
            Route::get('', 'VideoInformationController@index')->name('video.index');
            Route::post('', 'VideoInformationController@store')->name('video.store');
            Route::patch('', 'VideoInformationController@update')->name('video.update');
            Route::patch('/change', 'VideoInformationController@change_status')->name('change.status.video');
            Route::delete('', 'VideoInformationController@destroy')->name('video.destroy');
        });
        Route::group(['prefix' => 'image'], function(){
            Route::get('', 'ImageInformationController@index')->name('image.index');
            Route::post('', 'ImageInformationController@store')->name('image.store');
            Route::patch('', 'ImageInformationController@update')->name('image.update');
            Route::patch('/change', 'ImageInformationController@change_status')->name('change.status.image');
            Route::delete('', 'ImageInformationController@destroy')->name('image.destroy');
        });
    });
    Route::group(['prefix' => 'pengumuman'], function(){
        Route::get('', 'PengumumanController@index')->name('pengumuman.index');
        Route::post('', 'PengumumanController@store')->name('pengumuman.store');
        Route::patch('', 'PengumumanController@update')->name('pengumuman.update');
        Route::patch('/change', 'PengumumanController@change_status')->name('change.status.pengumuman');
        Route::delete('', 'PengumumanController@destroy')->name('pengumuman.destroy');
    });
    Route::group(['prefix' => 'welcome'], function(){
        Route::get('', 'WelcomeController@index')->name('welcome.index');
        Route::patch('', 'WelcomeController@update')->name('welcome.update');
    });
});
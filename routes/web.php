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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::group(['prefix'=>'company'],function(){
        Route::get('/create','CompanieController@create');
        Route::post('/store','CompanieController@store');
    });
    Route::group(['prefix'=>'employee'],function(){
        Route::get('/create','EmployeeController@create');
        Route::post('/store','EmployeeController@store');
        Route::get('/list','EmployeeController@showList')->name('employee.list');
    });
});

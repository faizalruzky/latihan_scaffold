<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('surahs', 'SurahsController');
Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web']], function () {
    Route::resource("appleTypes","AppleTypesController");// generated by scaffold - AppleType
    Route::get("appleTypes/appleType/{appleTypes}/duplicate", ['as' => 'appleTypes.duplicate', 'uses' => 'AppleTypesController@duplicate']);// generated by scaffold - AppleType
    Route::resource("apples","ApplesController");// generated by scaffold - Apple
    Route::get("apples/apple/{apples}/duplicate", ['as' => 'apples.duplicate', 'uses' => 'ApplesController@duplicate']);// generated by scaffold - Apple
});
Route::controller('datatables', 'DataTablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);
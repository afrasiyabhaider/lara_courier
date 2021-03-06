<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes([
    'register' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Local Records
 *
 */

Route::get('local-record', 'LocalRecordController@index');
Route::get('local-record/create', 'LocalRecordController@create');
Route::post('local-record/', 'LocalRecordController@store');
/**
 * Courier Records
 *
 */

Route::get('courier-record', 'CourierRecordController@index');
Route::get('courier-record/create', 'CourierRecordController@create');
Route::post('courier-record/', 'CourierRecordController@store');
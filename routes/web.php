<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Voyager;

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
//    return view('welcome');
    return redirect()->route('voyager.login');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

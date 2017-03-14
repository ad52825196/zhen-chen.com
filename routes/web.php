<?php

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

Route::get('/', 'HomeController@index') -> name('index');

Route::get('/guestbook', 'HomeController@guestbook') -> name('guestbook');

Route::get('/status', 'HomeController@status') -> name('status');

Route::get('/changelog', 'HomeController@changelog') -> name('changelog');

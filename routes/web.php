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

// HomeController

Route::get('/', 'HomeController@index') -> name('index');

Route::get('/guestbook', 'HomeController@guestbook') -> name('guestbook');

Route::get('/me', 'HomeController@me') -> name('me');

Route::get('/cv', 'HomeController@cv') -> name('cv');

Route::get('/status', 'HomeController@status') -> name('status');

Route::get('/changelog', 'HomeController@changelog') -> name('changelog');

// PortfolioController

Route::get('/portfolio/project', 'PortfolioController@project') -> name('portfolio.project');

Route::get('/portfolio/video', 'PortfolioController@video') -> name('portfolio.video');

Route::get('/portfolio/translation', 'PortfolioController@translation') -> name('portfolio.translation');

// GalleryController

Route::get('/gallery/people', 'GalleryController@people') -> name('gallery.people');

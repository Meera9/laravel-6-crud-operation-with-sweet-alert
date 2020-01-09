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


Route::get('/',function(){
	return view('welcome');
});

Route::middleware(['web', 'auth'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('portfolio','PortfolioController');
    Route::get('portfolio-ajax','PortfolioController@ajaxData')->name('portfolio.ajaxData');
    Route::get('portfolio-delete/{id}/','PortfolioController@destroy')->name('portfolio.delete');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('/', 'HomeController@index');
Route::get('/contacts.html', 'HomeController@contacts');
Route::get('/price.html', 'HomeController@price');
Route::get('/galmenu.html', 'HomeController@gallery');
Route::get('/uslugi.html', 'HomeController@uslugi');
Route::get('/pokraska.html', 'HomeController@pokraska');
Route::get('/{slug}.html', 'HomeController@uslugiDetail');

//Route::get('/contacts.html', function () {
//    return view('welcome');
//});
//Route::get('/price.html', function () {
//    return view('welcome');
//});
//Route::get('/galmenu.html', function () {
//    return view('welcome');
//});
//Route::get('/uslugi.html', function () {
//    return view('pages.uslugi');
//});
//Route::get('/pokraska.html', function () {
//    return view('welcome');
//});


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/admin/post', 'PostController')->middleware('auth'); //<- le "post" de la resource va êtré renvoyé dans les function du PostCOntroller on l'on aura utilisé le $post comme paramètre (VOIR update,show,...)

Route::resource('/admin/user', 'UserController' )->middleware('auth');
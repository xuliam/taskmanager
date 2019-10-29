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
//给路由命名 的两种方法；
Route::post('/projects',  'ProjectsController@store')->name('projects.store');
//Route::post('/projects',  ['uses'=>'ProjectsController@store', 'as'=>'projects.store']);

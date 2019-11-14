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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ProjectsController@index');
/*
//增
//给路由命名 的两种方法；
Route::post('projects',  'ProjectsController@store')->name('projects.store');
//Route::post('/projects',  ['uses'=>'ProjectsController@store', 'as'=>'projects.store']);
//删
Route::delete('projects/{project}', ['uses'=>'ProjectsController@destroy', 'as'=>'projects.destroy']);
//改
Route::patch('projects/{project}', ['uses'=>'ProjectsController@update', 'as'=>'projects.update']);
//查
Route::get('/', 'ProjectsController@index');
Route::get('projects/{project}', ['uses'=>'ProjectsController@show', 'as'=>'projects.show']);
*/


// resource 路由， 第一个参数是数据模型的复数，第二个是Controller名字
Route::resource('projects','ProjectsController');
Route::resource('tasks','TasksController');
Route::post('tasks/{id}/check', 'TasksController@check')->name('tasks.check');

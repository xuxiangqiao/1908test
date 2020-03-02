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


Route::get('/', function () {return view('welcome');});
//登入
Route::get('login','LoginController@login');
//执行登入
Route::post('/logindo','LoginController@logindo');
//管理员添加
Route::get('admin/creat','Admincontroller@create');
Route::post('admin/store','Admincontroller@store');
Route::get('admin/index','Admincontroller@index');
Route::get('admin/edit/{id}','Admincontroller@edit');
Route::post('admin/update/{id}','Admincontroller@update');
Route::get('admin/destroy/{id}','Admincontroller@destroy');
Route::get('admin/list','Admincontroller@list');


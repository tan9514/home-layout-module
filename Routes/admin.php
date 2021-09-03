<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// 模块
Route::get('module/list', 'ModuleController@list');
Route::get('module/ajaxList', 'ModuleController@ajaxList');

// 首页布局
Route::any('home/setting', 'HomeController@setting');


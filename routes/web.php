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

include_once 'paths\subdomainTest.php';
#--------------- posts
include_once 'paths\posts.php';
#-------------- Authorization controllers
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
#--------------- uploading controllers
include_once 'paths\uploading.php';
#--------------- users manager Controllers
include_once 'paths\users.php';
#--------------- menu manager Controllers
include_once 'paths\menu.php';
#--------------- Ajax Controllers
include_once 'paths\ajax.php';
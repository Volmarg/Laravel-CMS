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

/*
sprzatnac controllery w katalogu controllers, ktore od czegu np. view/ kontrola zapisu itp
*/

Route::get('/', 'frontController@posts');

#--------------- posts ctreation middleware
Route::put('/posting','postingController@create');
Route::post('/posting','postingController@edit');
Route::get('/posts/remove/{slug}','postingController@remove');

#-------------- Authorization controllers
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

#---------------- posts creation controllers
Route::get('/posts/create','PostsController@create');
Route::get('/posts/manage','PostsController@manage');
Route::get('/posts/edit/{slug}','PostsController@edit');

#---------------- showPosts
Route::get('/page/post/{slug}','PostsController@view');

#--------------- uploading controllers
Route::get('/upload','uploadController@send');
Route::post('/uploading','uploadController@save');

#--------------- media manager controllers
Route::get('/media-library','mediaLibraryController@view');
Route::get('media-process','mediaLibraryController@remove');

#--------------- users manager Controllers
Route::get('/users','UsersController@show');
Route::get('/user-remove/{slug}','UsersController@removeUser');
Route::post('/users-change-privilage','UsersController@changePrivilage');

#--------------- menu manager Controllers
Route::get('/menu','MenuController@view');
Route::post('/menu-edit','MenuController@edit');
#--------------- Ajax Controllers
Route::get('/ajaxUpdateMenu','ajaxUpdate@menuUpdate');

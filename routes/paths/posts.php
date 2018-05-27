<?php
//creating & editing
Route::put('/posting','postingController@create');
Route::post('/posting','postingController@edit');
Route::get('/posts/remove/{slug}','postingController@remove');
Route::get('/posts/create','PostsController@create');
Route::get('/posts/manage','PostsController@manage');
Route::get('/posts/edit/{slug}','PostsController@edit');

//view
Route::get('/page/post/{slug}','PostsController@view');

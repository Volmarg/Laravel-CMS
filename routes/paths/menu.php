<?php


Route::get('/menu','MenuController@view');
Route::post('/menu-edit','MenuController@edit');
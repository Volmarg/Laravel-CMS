<?php
Route::middleware(['superAdmin'])->group(function (){

    Route::get('/users','UsersController@show');
    Route::get('/user-remove/{slug}','UsersController@removeUser');
    Route::post('/users-change-privilage','UsersController@changePrivilage');

});
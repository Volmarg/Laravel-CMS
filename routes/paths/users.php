<?php
Route::middleware(['superAdmin:superAdmin'])->group(function (){

    Route::get('/users','UsersController@show');
    Route::get('/user-remove/{slug}','UsersController@removeUser');
    Route::post('/users-change-privilage','UsersController@changeUserType');
    Route::get('/users-privilege','UsersController@showPrivilege');
});
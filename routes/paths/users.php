<?php
Route::middleware(['superAdmin:superAdmin'])->prefix('users')->group(function (){

    Route::get('/manage','UsersController@show');
    Route::get('/remove/{slug}','UsersController@removeUser');
    Route::post('/changeUserType','UsersController@changeUserType');
    Route::get('/privilege','UsersController@showPrivilege');
    Route::post('/changeUserPrivileges','UsersController@changeUserPrivileges');
});
<?php
Route::prefix('users')->group(function (){

    Route::get('/manage','UsersController@show');
    Route::get('/remove/{slug}','UsersController@removeUser');
    Route::post('/changeUserType','UsersController@changeUserType');
    Route::get('/privilege','UsersController@showPrivilege');
    Route::post('/changeUserPrivileges','UsersController@changeUserPrivileges');
});

Route::prefix('user-settings')->group(function(){
    Route::get('/main-settings','UsersController@settingsPanel');
    Route::post('/user-options-save','UsersController@userOptions');
});
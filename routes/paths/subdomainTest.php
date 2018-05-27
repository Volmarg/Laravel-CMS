<?php
Route::domain('admin.localhost')->group(function(){
    Route::get('/', 'frontController@subdomain');
});
Route::get('/', 'frontController@posts');

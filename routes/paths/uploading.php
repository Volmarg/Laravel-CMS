<?php

Route::prefix('media')->group(function(){

    Route::get('/upload','uploadController@send');
    Route::post('/uploading','uploadController@save');

#--------------- media manager controllers
    Route::get('library','mediaLibraryController@view');
    Route::get('process','mediaLibraryController@remove');
});
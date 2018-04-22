<?php

Route::group(['middleware' => ['admin', 'auth'], 'prefix' => 'admin/media', 'namespace' => 'Modules\Media\Http\Controllers', 'as' => 'admin.media.'], function()
{
    Route::resource('/', 'MediaController', ['parameters' => array('' => 'media')] );
    Route::get('media/index_ajax', 
    [
        'as' => 'index_ajax',
        'uses' => 'MediaController@index_ajax'
    ]);
});

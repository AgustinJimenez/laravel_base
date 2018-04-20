<?php

Route::group(['middleware' => 'admin', 'prefix' => 'admin/media', 'namespace' => 'Modules\Media\Http\Controllers', 'as' => 'admin.media.'], function()
{
    Route::resource('/', 'MediaController', ['parameters' => array('' => 'media')] );
});

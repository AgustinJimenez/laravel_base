<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin/users', 'namespace' => 'Modules\Users\Http\Controllers'], function()
{
    Route::resource('users', 'UsersController');
});

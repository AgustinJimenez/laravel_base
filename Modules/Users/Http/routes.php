<?php

Route::group(['middleware' => ['admin', 'auth'], 'prefix' => 'admin/users', 'namespace' => 'Modules\Users\Http\Controllers', 'as' => 'admin.users.'], function()
{
    Route::resource('role', 'RolesController');
    Route::resource('/', 'UsersController',['parameters' => array('' => 'user')] );
});

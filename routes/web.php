<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (\Request $re) 
{
    //auth()->guard()->logout();

    //dd( auth()->guard(), auth()->user() );
    auth()->guard()->attempt(['name' => 'Administrator']);
    //auth()->guard()->login( \User::first() );

    //session()->regenerate();
    
    //dd( auth()->guard(), auth()->user() );

    return view('welcome');
});

Auth::routes();

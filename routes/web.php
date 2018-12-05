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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/savenota', 'GuardarNota@SaveToDo')->name('/todo');

Route::post('/config', 'GuardarNota@StructuNota')->name('not_pane');

Route::post('/salir', 'HomeController@log')->name('log');

Route::get('/home', 'HomeController@index')->name('home');

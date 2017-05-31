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

Route::get('/file_uploader', 'SampleController@file_input_index')->name('file_input_index');
Route::post('/file_upload', 'SampleController@file_upload')->name('file_upload');
Route::post('/file_delete', 'SampleController@file_delete')->name('file_delete');


Route::get('/dropzone', 'SampleController@dropzone_index')->name('dropzone');
Route::post('/dropzone_uploader', 'SampleController@dropzone_uploader')->name('dropzone_uploader');





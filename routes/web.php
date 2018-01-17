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

Route::get('/', 'NotesController@renderMain');

//create
Route::get('/note', 'NotesController@renderAddNote');
Route::post('/note', 'NotesController@addNote');

//edit id
Route::get('/note/{id}', 'NotesController@renderEditNote');
Route::post('/note/{id}', 'NotesController@editNote');

//del
Route::delete('/note/{id}', 'NotesController@deleteNote');
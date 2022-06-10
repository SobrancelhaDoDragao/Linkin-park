<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','App\Http\Controllers\AlbumController@listAlbum');
Route::post('/CreateAlbum','App\Http\Controllers\AlbumController@CreateAlbum');
Route::post('/DeleteAlbum/{id}','App\Http\Controllers\AlbumController@DeleteAlbum');
Route::post('/CreateFaixa','App\Http\Controllers\FaixaController@CreateFaixa');
Route::post('/DeleteFaixa/{id}','App\Http\Controllers\FaixaController@DeleteFaixa');


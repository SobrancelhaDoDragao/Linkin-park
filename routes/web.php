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
Route::post('/CreateAlbum','App\Http\Controllers\AlbumController@CreateAlbum')->name('CreateAlbum');
Route::get('/DeleteAlbum/{id}','App\Http\Controllers\AlbumController@DeleteAlbum')->name('DeleteAlbum');
Route::post('/CreateFaixa','App\Http\Controllers\FaixaController@CreateFaixa')->name('CreateFaixa');
Route::get('/DeleteFaixa/{id}','App\Http\Controllers\FaixaController@DeleteFaixa')->name('DeleteFaixa');
Route::get('/Pesquisar','App\Http\Controllers\AlbumController@listAlbum')->name('pesquisa');


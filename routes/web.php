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

Route::get('/',['uses' => 'HomeController@index']);

$router->get('/{provider}',['uses' => 'HomeController@showProviderCats']);

$router->get('/{provider}/{category}',['uses' => 'CategoryController@index']);

$router->get('/{number}/{type}/{provider}/{article}',['uses' => 'ArticleController@index']);

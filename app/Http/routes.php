<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//首页
Route::get('/', 'StaticPagesController@home')->name('home');

//相册资源路由
Route::resource('albums','AlbumsController');

//相片资源路由
Route::resource('photos','PhotosController');


//文章资源路由
Route::resource('articles','ArticlesController');

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

Route::namespace('Common')->group(function () {
    Route::get('/', 'PageController@home')->name('page.home');
    Route::get('/faqs', 'PageController@faqs')->name('page.faqs');
    Route::get('/page/{slug}', 'PageController@page')->name('pages.show');
});

Route::get('articles', 'ArticleController@index')->name('articles.index');
Route::get('article/{slug}', 'ArticleController@show')->name('articles.show');


Route::group(['prefix' => 'ajax','as'=>'ajax.','namespace'=>'Common','middleware'=>'honeypot'],function() {
    Route::post('feedbacks', 'AjaxController@feedbackStore')->name('feedbacks.store');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

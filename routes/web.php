<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('categories_news', function () {
    return view('categories_news');
});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/', 'HomeController@index')->name('LR9News');
    Route::get('Get-Posts-Details/{id}', 'PostController@get_details')->name('get.posts.details');
    Route::get('Get-News/{name}', 'HomeController@get_posts_categories')->name('get.posts.categories');
    Route::get('Search-News/', 'PostController@search')->name('get.search.news');
});


Route::post('Icons-Store', 'HomeController@icons')->name('save.icons');
Route::get('Get-Icons', 'HomeController@get_icon')->name('get.icons');

Route::get('Users', 'UsersController@index')->name('Users');
Route::get('Dashboard', 'DashboardController@index')->name('Dashboard');


Route::get('Posts', 'PostController@index')->name('Posts');
Route::get('Create-Posts', 'PostController@create')->name('Create.Posts');
Route::post('Store-Posts', 'PostController@store')->name('store.post');


Route::get('Categories', 'CategoryController@index')->name('Categories');
Route::post('Store-Categories', 'CategoryController@store')->name('store.category');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/default','IndexController@index')->name('index');

//For Book Category
 Route:: get('/books_category','CategoryController@index')->name('category');
 Route:: post('/books_category','CategoryController@store')->name('book_store');

 /*For Department Category*/
 Route::get('/department','DepartmentController@index')->name('dep_index');
 Route::post('/department','DepartmentController@store')->name('dep_store');

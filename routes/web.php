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
Route::post('/default','IndexController@store')->name('store');
Route::get('/default_edit/{id}','IndexController@edit')->name('default_edit');
Route::post('default_edit/{id}','IndexController@update')->name('default_update');
Route::get('/default_delete/{id}','IndexController@destroy')->name('default_delete');


//select book
Route::get('/selectbook/{id}', 'IndexController@selectBook')->name('selectbook');
Route::get('/removebook/{id}', 'IndexController@removebook')->name('removebook');



//For Book Category
 Route:: get('/books_category','CategoryController@index')->name('category');
 Route:: post('/books_category','CategoryController@store')->name('book_store');
 Route::get('/book_delete/{id}','CategoryController@destroy')->name('book_delete');
 Route::get('/book_edit/{id}','CategoryController@edit')->name('book_edit');
 Route::post('/book_edit/{id}','CategoryController@update')->name('book_update');
 Route::get('/book_show/{id}','CategoryController@show')->name('book_show');

 /*For Department Category*/
 Route::get('/department','DepartmentController@index')->name('dep_index');
 Route::post('/department','DepartmentController@store')->name('dep_store');
 Route::get('/dep_delete/{id}','DepartmentController@destroy')->name('dep_delete');
 Route::get('/department_edit/{id}','DepartmentController@edit')->name('dep_edit');
  Route::post('/department_edit/{id}','DepartmentController@update')->name('dep_update');
 Route::get('/show/{id}','DepartmentController@show')->name('depart_show');
 Route::get('/dep_filter','DepartmentController@filter')->name('dep_filter');

 //for myprofile
 Route::get('/profile/{id}','Auth\RegisterController@edit')->name('profile_edit');
 Route::post('/profile/{id}','Auth\RegisterController@update')->name('profile_update');


/*total Book*/
Route::get('/books','BookController@index')->name('book_index');
Route::post('/books','BookController@store')->name('category_store');
 Route::get('/delete/{id}','BookController@destroy')->name('delete');
 Route::get('/edit/{id}','BookController@edit')->name('totaledit');
  Route::post('/edit/{id}','BookController@update')->name('totalupdate');

  //For borrower
  Route::get('/borrower','BorrowerController@index')->name('borrower_index');
  //borrower delete
  Route::get('borrower_delete/{id}','BorrowerController@destroy')->name('borrower_delete');
  //edit
   Route::get('/borrower_edit/{id}','BorrowerController@edit')->name('bor_edit');
  Route::post('/borrower_edit/{id}','BorrowerController@update')->name('bor_update');
  Route::get('/filter','BorrowerController@filter')->name('filter');
  //check book
 Route::get('/checkbook/{id}', 'BorrowerController@checkBook')->name('checkbook');
 //filter



 //Borrower book to return book
 Route::get('/borrow-book', 'BorrowbookController@index')->name('bookborrow');
 Route::get('/borrow-book/{id}', 'BorrowbookController@show')->name('showborbook');
 Route::get('/backbook/{id}', 'BorrowbookController@backbook')->name('bbook');


 //chart
 Route::get('chart', 'ChartController@index')

 

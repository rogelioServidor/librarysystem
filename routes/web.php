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
    return view('auth.login');
});

//BOOK ROUTES//
//add book routes
Route::get('/add/bookpage','BooksController@getAddBookPage');
Route::post('/add/book','BooksController@postAddBook');
//search book routes
Route::get('/search/bookpage','BooksController@getSearchBookPage');
Route::get('/search/book','BooksController@getSearchBook');
//update book route
Route::post('/update/bookname','BooksController@postUpdateBookName');
//delete book route
Route::post('/delete/book','BooksController@postDeleteBook');

//USER ROUTES//
//add user routes
Route::get('/add/userpage','UsersController@getAddUserPage');
Route::post('/add/user','UsersController@postAddUser');
//update user routes
Route::get('/update/userpage','UsersController@getUpdateUserPage');
Route::post('/update/user','UsersController@postUpdateUser');

//TRANSACTION ROUTES//
//borrow book routes
Route::post('/borrow/bookpage','TransactionsController@postBorrowBookPage');
Route::post('/borrow/book','TransactionsController@postBorrowBook');
//search transaction routes
Route::get('/search/transactionpage','TransactionsController@getSearchTransactionPage');
Route::get('/search/transaction','TransactionsController@getSearchTransaction');
Route::post('/return/book','TransactionsController@postReturnBook');


Auth::routes();
Route::get('/home', 'HomeController@index');

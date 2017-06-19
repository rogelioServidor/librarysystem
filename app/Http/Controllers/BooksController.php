<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
	public function getAddBookPage(){
		return view('books.add_book_page');
	}

    public function postAddBook(Request $request){
    	Book::addBook($request->all());
    	return redirect('/add/bookpage');
    }

    public function getSearchBookPage(){
    	return view('books.search_book_page');
    }

    public function getSearchBook(Request $request){
    	$book = Book::searchBook($request->bookname);
    	return view('books.search_book',compact('book'));
    }

    public function postUpdateBookName(Request $request){
    	$id = $request->id;
    	$new_name = $request->name;
    	Book::updateBookName($id,$new_name);
    	return redirect('/search/bookpage');
    }

    public function postDeleteBook(Request $request){
    	$id = $request->id;
    	Book::deleteBook($id);
    	return redirect('/search/bookpage');
    }
}

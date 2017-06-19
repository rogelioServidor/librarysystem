<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Transaction;
use Auth;

class TransactionsController extends Controller
{
    public function postBorrowBookPage(Request $request){
    	$book = Book::searchBookById($request->book_id);
    	return view('transactions.borrow_book_page',compact('book'));
    }

    public function postBorrowBook(Request $request){
    	Transaction::borrowBook($request->all());
    	Book::updateBookStatusToBorrowed($request->book_id);
    	return redirect('/search/bookpage');
    }

    public function getSearchTransactionPage(){
    	return view('transactions.search_transaction_page');
    }

    public function getSearchTransaction(Request $request){
    	$transaction = Transaction::searchTransaction($request->transaction_id);
    	return view('transactions.return_book_page',compact('transaction'));
    }

    public function postReturnBook(Request $request){
    	$transaction_id = $request->transaction_id;
    	$user_id = Auth::user()->id;
    	$book_id = $request->book_id;
    	Transaction::updateTransactionUserIdAndStatusToReturned($transaction_id,$user_id);
    	Book::updateBookStatusToNotBorrowed($book_id);
    	return redirect('/search/transactionpage');
    }
}

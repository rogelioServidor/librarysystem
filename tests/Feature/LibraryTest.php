<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Book;
use App\Transaction;

class LibraryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;


    public function testAddBook(){
        //create book
        $book = ['name'=>'math'];
        $added_book = Book::addBook($book);
        //search book
        $found_book = Book::searchBook('math');
        //assert
        $this->assertEquals($added_book->name,$found_book->name);
    }


    public function testSearchBook(){
        //create book
        $book = factory(Book::class)->create([
            'name' => 'math'
        ]);
        //search book
        $found_book = Book::searchBook('math');
        //assert
        $this->assertEquals($book->name, $found_book->name);
    }


    public function testUpdateBook(){
        //create book
        $book = factory(Book::class)->create([
            'name' => 'filipino',
            'status' => 0,
        ]);
        // search book
        $found_book = Book::searchBook('filipino');
        //assert
        $this->assertEquals($book->status, $found_book->status);


        //update book status to borrowed
        Book::updateBookStatusToBorrowed($book->id);
        //search book
        $found_book = Book::searchBook('filipino');
        //assert
        $this->assertEquals(1, $found_book->status);


        //update book name
        $new_name = 'filipino2';
        Book::updateBookName($book->id,$new_name);
        //search book
        $found_book = Book::searchBook($new_name);
        //assert
        $this->assertEquals($new_name, $found_book->name);
    }

    public function testDeleteBook(){
        //create book
        $book = factory(Book::class)->create([
            'name' => 'filipino',
            'status' => 0,
        ]);
        // search book
        $found_book = Book::searchBook('filipino');
        //assert
        $this->assertEquals($book->status, $found_book->status);


        //delete book
        Book::deleteBook($found_book->id);
        // search book if null
        $found_book = Book::searchBook('filipino');
         //assert
        $this->assertNull($found_book);
    }

    public function testUser(){
        //create user
        $user = [
            'email' => 'rjbadz1@gmail.com',
            'username' => 'rjbadz1',
            'password' => 'secret',
            'lastname' => 'badz1',
            'firstname' => 'rj',
        ];
        $added_user = User::addUser($user);
        //assert
        $this->assertEquals('rjbadz1',$added_user->username);


        $new_password = 'secret2';
        $new_lastname = 'badz2';
        $new_firstname = 'rj2';
        //update user
        User::updateUser($added_user->id,$new_password,$new_lastname,$new_firstname);
        //search user
        $found_user = User::searchUser($added_user->id);
        //assert
        $this->assertEquals($new_password, $found_user->password);
        $this->assertEquals($new_lastname, $found_user->lastname);
        $this->assertEquals($new_firstname, $found_user->firstname);


        //delete user
        User::deleteUser($found_user->id);
        //search user if null
        $found_user = User::searchUser($added_user->id);
        //assert
        $this->assertNull($found_user);
    }

    public function testBorrowTransaction(){
        //create user
        $user = factory(User::class)->create([
            'email' => 'rjbadz1@gmail.com',
            'username' => 'rjbadz1',
            'password' => 'secret',
            'lastname' => 'badz1',
            'firstname' => 'rj',
        ]);

        //create book
        $book = factory(Book::class)->create(['name' => 'math']);

        //creat borrow transaction
        $borrow_transaction_info = [
            'student_id' => 'student1',
            'student_lastname' => 'serv',
            'student_firstname' => 'rog',
            'book_id' => $book->id,
            'user_id' => $user->id,
        ];
        $added_transaction = Transaction::borrowBook($borrow_transaction_info);
        //assert
        $this->assertEquals($borrow_transaction_info['book_id'],$added_transaction->book_id);


        //update book status to borrowed
        Book::updateBookStatusToBorrowed($borrow_transaction_info['book_id']);
        //search book
        $found_book = Book::searchBookById($borrow_transaction_info['book_id']);
        //assert
        $this->assertEquals(1, $found_book->status);
    }


    public function testReturnTransaction(){
        //create user
        $user = factory(User::class)->create([
            'email' => 'rjbadz1@gmail.com',
            'username' => 'rjbadz1',
            'password' => 'secret',
            'lastname' => 'badz1',
            'firstname' => 'rj',
        ]);

        //create book
        $book = factory(Book::class)->create(['name' => 'math']);

        //create borrow transaction
        $borrow_transaction_info = factory(Transaction::class)->create([
            'student_id' => 'student1',
            'student_lastname' => 'serv',
            'student_firstname' => 'rog',
            'book_id' => $book->id,
            'user_id' => $user->id,
        ]);


        //update transaction status to returned and update the user id
        Transaction::updateTransactionUserIdAndStatusToReturned($borrow_transaction_info->id,$borrow_transaction_info->user_id);
        //search updated transaction
        $found_transaction = Transaction::searchTransaction($borrow_transaction_info->id);
        //assert
        $this->assertEquals(1,$found_transaction->user_id);
        $this->assertEquals(1,$found_transaction->status);


        //update book status to not borrowed
        Book::updateBookStatusToNotBorrowed($borrow_transaction_info->book_id);
        //search updated book
        $found_book = Book::searchBookById($book->id);
        //assert
        $this->assertEquals(0,$found_book->status);

    }

}
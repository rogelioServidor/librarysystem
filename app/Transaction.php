<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

	protected $fillable = [
        'student_id', 'student_lastname', 'student_firstname','book_id','user_id',
    ];

    /*public function book(){
        return $this->belongsTo(Book::class);
    }*/

    public static function borrowBook($borrow_transaction_info){
        return self::create($borrow_transaction_info);
    }

    public static function updateTransactionUserIdAndStatusToReturned($transaction_id,$transaction_user_id){
        
    	self::whereId($transaction_id)
    		->update(['user_id' => $transaction_user_id,'status' => 1]);
    }

    public static function searchTransaction($id){
    	return self::find($id);
    }
}
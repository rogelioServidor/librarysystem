<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

	protected $fillable = [
        'name',
    ];

    /*public function transactions(){
        return $this->hasMany(Transaction::class);
    }*/

	public static function addBook($book){
    	return self::create($book);
    }

    public static function searchBook($bookname){
    	return self::whereName($bookname)->first();
    }

    public static function searchBookById($id){
        return self::find($id);
    }

    public static function updateBookStatusToBorrowed($id){
    	return self::whereId($id)
    				->update(['status' => 1]);
    }

    public static function updateBookStatusToNotBorrowed($id){
        return self::whereId($id)
                    ->update(['status' => 0]);
    }

    public static function updateBookName($id,$new_name){
    	return self::whereId($id)
    				->update(['name' => $new_name]);
    }

    public static function deleteBook($id){
        self::destroy($id);
    }

}

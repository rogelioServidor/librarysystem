<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'username', 'password','lastname','firstname',
        /*'name', 'email', 'password',*/
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //set password to bcrypt
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    //get the attribute lastname and return string to upper
    public function getLastnameAttribute($value){
        return strtoupper($value);
    }

    //get the attribute firstname and return string to upper
    public function getFirstnameAttribute($value){
        return strtoupper($value);
    }

    //add user
    public static function addUser($request){
        return self::create($request);
    }

    //search user
    public static function searchUser($id){
        return self::find($id);
    }

    //update user profile
    public static function updateUser($id,$new_password,$new_lastname,$new_firstname){
        self::whereId($id)
                    ->update(['password' => $new_password,
                                'lastname' => $new_lastname,
                                'firstname' => $new_firstname,
                            ]);
    }

    //delete user
    public static function deleteUser($id){
        self::destroy($id);
    }
}

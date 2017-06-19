<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function getAddUserPage(){
    	return view('users.add_user_page');
    }

    public function postAddUser(Request $request){
    	User::addUser($request->all());
    	return redirect('/add/userpage');
    }

    public function getUpdateUserPage(){
    	return view('users.update_user_page');
    }

    public function postUpdateUser(Request $request){
        $id = Auth::user()->id;
        $password = bcrypt($request->password);
        $lastname = $request->lastname;
        $firstname = $request->firstname;
        User::updateUser($id,$password,$lastname,$firstname);
    	return redirect('/update/userpage');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class UserHomeController extends Controller
{
    public function home(){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];
        if($user_role == "admin")
            return redirect('/admin')->with('status', "You are not permitted to execute this operation!");
        $newest_books = Book::take(3)->get();
        return view('auth0.user.home.home', [
            'newest_books' => $newest_books,
        ]);
    }
}

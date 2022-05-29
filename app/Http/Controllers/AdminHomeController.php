<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookRequest;
use App\Models\ActivityLog;

class AdminHomeController extends Controller
{
    public function home($role = null){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];
        if($user_role == "user")
            return redirect('/user')->with('status', "You are not permitted to execute this operation!");

        $books = Book::get();
        $logs = ActivityLog::get();
        $logsByRole = ActivityLog::where('role', $role)->get();
        $request_books = BookRequest::get();
        $total_pending_requests = BookRequest::where('status', 'Pending')->get();

        $request_count = count($request_books);
        $pending_count = count($total_pending_requests);
        $book_count = count($books);
        return view('auth0.admin.home.home', [
            'logs' => $role == null ? $logs : $logsByRole,
            'book_count' => $book_count,
            'pending_count' => $pending_count,
            'request_count' => $request_count,
        ]);
    }
}

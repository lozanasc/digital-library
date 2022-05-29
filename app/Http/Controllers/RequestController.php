<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BookRequest;
use App\Models\ActivityLog;

class RequestController extends Controller
{
    // ! Could use some refactoring...

    public function approve($id){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];
        if($user_role == "user")
            return redirect('/user')->with('status', "You are not permitted to execute this operation!");

        $to_approve = BookRequest::find($id);
        $to_approve->status = "Approved";

        $to_deduct = Book::where('name', $to_approve->book_name)->first();
        if($to_deduct->physical_qty > 0){
            $to_deduct->physical_qty = $to_deduct->physical_qty - 1;
        }

        $to_approve->save();
        $to_deduct->save();

        $approve_request_log = ActivityLog::create([
            'name' => auth()->user()->name,
            'activity' => auth()->user()->name . " approved request to borrow book " . $to_approve->name . ".",
            'changes' => "Book Request",
            'role' => $user_role,
        ]);

        return redirect()->back()->with('status', 'Request approved!');
    }

    public function cancel($id){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];

        $request = BookRequest::find($id);
        $to_return = Book::where('name', $request->book_name)->first();

        if($request->status === "Approved"){
            $request->status = "Returned";
            $to_return->physical_qty = $to_return->physical_qty + 1;
            $to_return->save();
            $request->save();
            if($to_return)
                return redirect()->back()->with('status', 'Book Returned!');
            else
                return redirect()->back()->with('status', 'Something went wrong, return failed!');
        } else {
            $cancel_request = BookRequest::where('id', $id)->delete();
            if($cancel_request){
                $cancel_request_log = ActivityLog::create([
                    'name' => auth()->user()->name,
                    'activity' => auth()->user()->name . " cancelled " . $to_return->name . " from the records ",
                    'changes' => "Book Request",
                    'role' => $user_role,
                ]);
                return redirect()->back()->with('status', 'Requested book is removed!');
            }
            else
                return redirect()->back()->with('status', 'Something went wrong, cancellation failed!');
        }

    }

    public function beforeRequestBook($id){
        $prev_book = Book::where('id', $id)->first();
        return view('auth0.user.books.request', [
            'info' => $prev_book
        ]);
    }

    public function view_books(){
        $requested_books = BookRequest::where('request_name', auth()->user()->name)->get();
        return view('auth0.user.books.my', [
            'books' => $requested_books,
        ]);
    }

    public function view_all_requests(){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];
        if($user_role == "user")
            return redirect('/user')->with('status', "You are not permitted to execute this operation!");
        
        $requested_books = BookRequest::get();
        return view('auth0.admin.request.request', [
            'books' => $requested_books,
        ]);
    }

    public function requestBook(Request $request, $book_name)
    {
        $this->validate($request, [
            'reason' => 'required',
            'return_date' => 'required'
        ]);
        if(!auth()->user())
            return redirect('/')->with('status', 'Not allowed!');
        else {
            $request_book = BookRequest::create([
                'request_name' => auth()->user()->name,
                'status' => "Pending",
                'reason' => $request->reason,
                'book_name' => $book_name,
                'return_date' => $request->return_date,
            ]);
            if(!$request_book)
                return redirect()->back()->with('status', 'Something went wrong, book insertion failed!');
            else
                return redirect()->back()->with('status', 'Request for the book: ' . $book_name . ' is successful');
        }
    }
}

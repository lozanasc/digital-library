<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\ActivityLog;
use App\Http\Controllers\Controller;


class BookController extends Controller
{

    public function beforeEditBook($id){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];
        if($user_role == "user")
            return redirect('/user')->with('status', "You are not permitted to execute this operation!");
        else {
            $edit = Book::where('id', $id)->first();

            $book_attempt_edited_log = ActivityLog::create([
                'name' => auth()->user()->name,
                'activity' => auth()->user()->name . " attempted to update " . $edit->name . " from the records.",
                'changes' => "Book",
                'role' => $user_role,
            ]);

            if(!$edit)
                return redirect('/user')->with('status', "You are not permitted to execute this operation!");
            
            return view('auth0.admin.books.edit', [
                'info' => $edit
            ]);
        }
    }

    public function editBook(Request $request, $id){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];
        if($user_role == "user")
            return redirect('/user')->with('status', "You are not permitted to execute this operation!");
        else {
            $this->validate($request, [
                'isbn' => 'required',
                'title' => 'required',
                'author' => 'required',
                'physical_qty' => ['required', 'min:1'],
                'synopsis' => 'required',
                'book_cover' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
                'digital_copy' => 'mimes:pdf|max:10000',
                'subject' => 'required',
                'date_published' => 'required',
            ]);

            $cover_path = $request->file('book_cover')->store('public/covers');
            $copy_path = $request->file('digital_copy') !== null ? $request->file('digital_copy')->store('public/copy') : null;

            $cover_ref_for_db = $cover_path;
            $copy_ref_for_db = $copy_path;

            $edit = Book::find($id);
            $edit->isbn_no = $request->isbn;
            $edit->name = $request->title;
            $edit->author = $request->author;
            $edit->physical_qty = $request->physical_qty;
            $edit->book_cover = $cover_ref_for_db;
            $edit->digital_copy = $copy_ref_for_db;
            $edit->subject = $request->subject;
            $edit->date_published = $request->date_published;

            $book_edited_log = ActivityLog::create([
                'name' => auth()->user()->name,
                'activity' => auth()->user()->name . " updated " . $request->title . " from the records ",
                'changes' => "Book",
                'role' => $user_role,
            ]);

            $edit->save();
            
            return redirect()->back()->with('status', "Book successfully edited!");
        }
    }

    public function delete($id){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];
        if($user_role == "user")
            return redirect('/user')->with('status', "You are not permitted to execute this operation!");
        else {
            $prev_book = Book::where('id', $id)->first();
            $delete = Book::where('id', $id)->delete();
            
            if(!$delete)
            return redirect('/user')->with('status', "You are not permitted to execute this operation!");
            $book_deleted_log = ActivityLog::create([
                'name' => auth()->user()->name,
                'activity' => auth()->user()->name . " deleted " . $prev_book->name . " from the records ",
                'changes' => "Book",
                'role' => $user_role,
            ]);
            
            return redirect()->back()->with('status', "Book successfully deleted!");
        }
    }

    public function search(Request $request){
        
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];

        $this->validate($request, [
            'query' => 'required'
        ]);
        
        $search_for = $request->only('query');

        $info = Book::where('name', $search_for)->get();
        $book_categories = Book::distinct('subject')->pluck('subject');
        
        if(!$info)
            return back()->with('status', 'Searched book is not found!');
        
        if($user_role === "user")
            return view('auth0.user.books.list', [
                'books' => $info
            ]);
        else
            return view('auth0.admin.books.list', [
                'books' => $info,
                'subjects' => $book_categories
            ]);
    }

    public function preview($id){
        $prev_book = Book::where('id', $id)->first();
        return view('auth0.user.books.preview', [
            'info' => $prev_book
        ]);
    }

    public function view_books(){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];

        $books = Book::get();
        $book_categories = Book::distinct('subject')->pluck('subject');
        
        if($user_role == "admin"){
            return view('auth0.admin.books.list', [
            'books' => $books,
            'subjects' => $book_categories
            ]);
        }
        
        return view('auth0.user.books.list', [
            'books' => $books,
        ]);
    }

    public function filtered_view_books($subject){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];

        $books = Book::get();
        $book_categories = Book::distinct('subject')->pluck('subject');
        $booksBySubject = Book::where('subject', $subject)->get();
        
        if($user_role == "admin"){
            return view('auth0.admin.books.list', [
            'books' => $subject === null ? $books : $booksBySubject,
            'subjects' => $book_categories
            ]);
        }
        
        return view('auth0.user.books.list', [
            'books' => $books,
        ]);
    }

    public function add_book_to_db(Request $request){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];
        
        if($user_role == "user")
            return redirect('/user')->with('status', "You are not permitted to execute this operation!");
        else {
            $this->validate($request, [
                'isbn' => 'required',
                'title' => 'required',
                'author' => 'required',
                'physical_qty' => ['required', 'min:1'],
                'synopsis' => 'required',
                'book_cover' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
                'digital_copy' => 'mimes:pdf|max:10000',
                'subject' => 'required',
                'date_published' => 'required',
            ]);
            $cover_path = $request->file('book_cover')->store('public/covers');
            $copy_path = $request->file('digital_copy') !== null ? $request->file('digital_copy')->store('public/copy') : "";

            $cover_ref_for_db = $cover_path;
            $copy_ref_for_db = $copy_path;

            $book_insert = Book::create([
                'isbn_no' => $request->isbn,
                'name' => $request->title,
                'author' => $request->author,
                'physical_qty' => $request->physical_qty,
                'synopsis' => $request->synopsis,
                'book_cover' => $cover_ref_for_db,
                'digital_copy' => $copy_ref_for_db,
                'subject' => $request->subject,
                'notes' => $request->notes,
                'date_published' => $request->date_published,
            ]);

            
            if(!$book_insert)
            return redirect()->back()->with('status', 'Something went wrong, book insertion failed!');
            else {
                $book_insert_log = ActivityLog::create([
                    'name' => auth()->user()->name,
                    'activity' => auth()->user()->name . " added " . $request->title . " to the records ",
                    'changes' => "Book",
                    'role' => $user_role,
                ]);
                return redirect()->back()->with('status', 'Book added successfully!');
            }
        }
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ActivityLogsController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    if (Auth::check()) {
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = Auth::user()->$roles_url[0];
        if($user_role === "admin")
            return redirect("/admin/home");
        else
            return redirect("/user/home");
    } else {
        return view('landing');
    }
})->middleware(['auth0.authenticate']);

Route::get('/admin/home', [AdminHomeController::class, "home"])->middleware(['auth0.authenticate']);
Route::get('/admin/home/{role}', [AdminHomeController::class, "home"])->name('filterByRole')->middleware(['auth0.authenticate']);

Route::get('/admin/profile', function () {
    if (Auth::check()) {
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = Auth::user()->$roles_url[0];
        if($user_role === "admin")
            return view('auth0.admin.profile.profile');
        else
            return redirect("/user/profile");
    } else {
        return view('landing');
    }
})->middleware(['auth0.authenticate']);

Route::get('/admin/books/new', function () {
    if (Auth::check()) {
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = Auth::user()->$roles_url[0];
        if($user_role === "admin")
            return view('auth0.admin.books.add');
        else
            return redirect("/user");
    } else {
        return view('landing');
    }
})->middleware(['auth0.authenticate']);

Route::get('/admin/books', [BookController::class, 'view_books'])->middleware(['auth0.authenticate']);
Route::get('/admin/books/{id}', [BookController::class, 'preview'])->name('preview')->middleware(['auth0.authenticate']);
Route::get('/admin/books/filterBy/{subject}', [BookController::class, 'filtered_view_books'])->name('filterBySubject')->middleware(['auth0.authenticate']);
Route::post('/admin/books/new', [BookController::class, "add_book_to_db"])->name("push_to_db")->middleware(['auth0.authenticate']);
Route::get('/admin/books/edit/{id}', [BookController::class, "beforeEditBook"])->name("to_edit_book")->middleware(['auth0.authenticate']);
Route::post('/admin/books/edit/{id}', [BookController::class, "editBook"])->name("editBook")->middleware(['auth0.authenticate']);
Route::get('/admin/books/delete/{id}', [BookController::class, 'delete'])->name('deleteBook')->middleware(['auth0.authenticate']);
Route::get('/admin/all/requests', [RequestController::class, 'view_all_requests'])->name('allRequests')->middleware(['auth0.authenticate']);
Route::get('/admin/requests/approve/{id}', [RequestController::class, 'approve'])->name('approveRequest')->middleware(['auth0.authenticate']);
Route::get('/admin/logs/view/{id}', [ActivityLogsController::class, 'viewLog'])->name('view_log')->middleware(['auth0.authenticate']);
Route::get('/admin/users', [UserController::class, 'view_users'])->name('view_users')->middleware(['auth0.authenticate']);
Route::get('/admin/users/delete/{id}', [UserController::class, 'delete_user'])->name('deleteUser')->middleware(['auth0.authenticate']);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('/user', function () {
    if (Auth::check()) {
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = Auth::user()->$roles_url[0];
        if($user_role === "admin")
            return redirect("/admin");
        else
            return redirect("/user/home");
    } else {
        return view('landing');
    }
})->middleware(['auth0.authenticate']);



Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/user');
    }
    return view('landing');
})->middleware(['auth0.authenticate.optional']);

Route::get('/user/home', [UserHomeController::class, "home"])->middleware(['auth0.authenticate']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/user/books', function () {
    if (Auth::check()) {
        return view('auth0.user.books.list');
    } else {
        return view('landing');
    }
})->middleware(['auth0.authenticate']);

Route::get('/user/profile', [UserController::class, 'profile'])->middleware(['auth0.authenticate']);
Route::post('/user/profile/update/{id}', [UserController::class, 'edit_user'])->name('edit_user')->middleware(['auth0.authenticate']);
Route::get('/user/books', [BookController::class, 'view_books'])->middleware(['auth0.authenticate']);
Route::get('/user/books/{id}', [BookController::class, 'preview'])->name('preview')->middleware(['auth0.authenticate']);
Route::post('/user/books', [BookController::class, 'search'])->name('search')->middleware(['auth0.authenticate']);
Route::get('/user/books/request/{id}', [RequestController::class, 'beforeRequestBook'])->name('requestBookPreview')->middleware(['auth0.authenticate']);
Route::get('/user/books/request/cancel/{id}', [RequestController::class, 'cancel'])->name('cancelRequest')->middleware(['auth0.authenticate']);
Route::post('/user/books/request/{book_name}', [RequestController::class, 'requestBook'])->name('requestBook')->middleware(['auth0.authenticate']);
Route::get('/user/books/printable/{id}', [RequestController::class, 'previewPrintable'])->name('viewPrintable')->middleware(['auth0.authenticate']);
Route::get('/user/my/books', [RequestController::class, 'view_books'])->name('myBooks')->middleware(['auth0.authenticate']);
Route::get('/login', \Auth0\Laravel\Http\Controller\Stateful\Login::class)->name('login');
Route::get('/logout', \Auth0\Laravel\Http\Controller\Stateful\Logout::class)->name('logout');
Route::get('/auth0/callback',\Auth0\Laravel\Http\Controller\Stateful\Callback::class)->name('auth0.callback');

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/about', function () {
    return view('about');
});



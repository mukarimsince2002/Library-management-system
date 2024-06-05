<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ViewController;
use App\Models\Book;
use Doctrine\DBAL\Driver\Middleware;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index']);
Route::get('/book_history',[HomeController::class,'book_history']);
Route::get('/cancel_req/{id}',[HomeController::class,'cancel_req']);
Route::get('/explore',[HomeController::class,'explore']);
Route::get('/search',[HomeController::class,'search']);
Route::get('/category/{id}',[HomeController::class,'category']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[AdminController::class,'index']);
Route::get('/category',[CategoryController::class,'index'])->middleware(['auth','admin']);
Route::post('/add_category',[CategoryController::class,'create'])->middleware(['auth','admin']);
Route::get('/edit_category/{id}',[CategoryController::class,'edit'])->middleware(['auth','admin']);
Route::post('/update_category/{id}',[CategoryController::class,'update'])->middleware(['auth','admin']);
Route::get('/delete_category/{id}',[CategoryController::class,'destroy'])->middleware(['auth','admin']);


Route::get('/book_details/{id}',[ViewController::class,'index'])->middleware(['auth','admin']);
Route::get('/borrow_books/{id}',[ViewController::class,'show'])->middleware(['auth','admin']);
Route::get('/borrow_request',[BorrowController::class,'index'])->middleware(['auth','admin']);
Route::get('/approve_book/{id}',[BorrowController::class,'approve'])->middleware(['auth','admin']);
Route::get('/return_book/{id}',[BorrowController::class,'return'])->middleware(['auth','admin']);
Route::get('/reject_book/{id}',[BorrowController::class,'reject'])->middleware(['auth','admin']);




Route::get('/view_book',[BookController::class,'index'])->middleware(['auth','admin']);
Route::get('/create_book',[BookController::class,'create'])->middleware(['auth','admin']);
Route::post('/add_book',[BookController::class,'store'])->middleware(['auth','admin']);
Route::get('/edit_book/{id}',[BookController::class,'edit'])->middleware(['auth','admin']);
Route::post('/update_book/{id}',[BookController::class,'update'])->middleware(['auth','admin']);
Route::get('/delete_book/{id}',[BookController::class,'destroy'])->middleware(['auth','admin']);

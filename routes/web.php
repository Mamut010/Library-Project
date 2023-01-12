<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Admin\AdminBookBorrowController;

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

Route::permanentRedirect('/', '/home');

Route::get('/home', [\App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [\App\Http\Controllers\Home\AboutUsController::class, 'index'])->name('about-us');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/client.php';

Route::middleware(['auth', 'verified'])->group(function() {
    Route::resource('users', \App\Http\Controllers\Resource\UserController::class);
    Route::resource('books', \App\Http\Controllers\Resource\BookController::class);
    Route::resource('booktypes', \App\Http\Controllers\Resource\BooktypeController::class);
    Route::resource('books.feedbacks', \App\Http\Controllers\Resource\FeedbackController::class);

    Route::get('/books-intro', [\App\Http\Controllers\Home\HomeController::class, 'booksIntro'])->name('books.intro');

    Route::get('/advanced-search', [\App\Http\Controllers\User\SearchBookController::class, 'showClientAdvanceSearchPage'])
        ->name('books.advanced-search-page');
    Route::get('/admin/advanced-search', [\App\Http\Controllers\User\SearchBookController::class, 'showAdminAdvanceSearchPage'])
        ->name('admin.books.advanced-search-page');
    Route::get('/search', [\App\Http\Controllers\User\SearchBookController::class, 'clientSearch'])->name('books.search');
    Route::get('/admin/search', [\App\Http\Controllers\User\SearchBookController::class, 'adminSearch'])->name('admin.books.search');
});


//Administration routes
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('send-email/{user}', [\App\Http\Controllers\Resource\MailController::class, 'sendEmail'])->name('books.borrows.email');
    Route::group(['middleware' => ['role_or_permission:superadmin|account.manage']], function () {
        Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
    });

    Route::get('/books-delete-confirm/{book}', [\App\Http\Controllers\Resource\BookController::class, 'confirm'])->name('books.confirm');
    Route::get('/search-books', [\App\Http\Controllers\User\SearchBookController::class, 'index'])->name('books.search-page');
    Route::get('/booktypes-delete-confirm/{booktype}', [\App\Http\Controllers\Resource\BooktypeController::class, 'confirm'])->name('booktypes.confirm');

    Route::prefix('/admin')->group(function() {
        Route::prefix('/borrow-book')->group(function() {
            Route::get('/history', [AdminBookBorrowController::class, 'index'])->name('books.borrows.index');
//            Route::get('/history/{book}', [\App\Http\Controllers\User\Admin\AdminBorrowController::class, 'show'])->name('books.borrows.show');
            Route::put('/history/{user}/{book}', [AdminBookBorrowController::class, 'return'])->name('books.borrows.return');
            Route::delete('/history/{user}/{book}', [AdminBookBorrowController::class, 'delete'])->name('books.borrows.delete');
            Route::get('/history/{user}/{book}', [AdminBookBorrowController::class, 'confirm'])->name('books.borrows.confirm');
        });
        Route::get('/dashboard', [\App\Http\Controllers\User\Admin\AdminHomeController::class, 'index'])->name('admin.dashboard');
    });
});

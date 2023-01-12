<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\BorrowsHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBookBorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = BorrowsHistory::with('book')->with('user')->orderBy('borrowed_date', 'DESC')->paginate(10);
        return view('admin.borrows.borrow-books-index', ['records' => $records]);
    }

    /**
     * Updated the book status as returned
     *
     * @param \App\Models\Book $book
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     *
     */
    public function return(User $user, Book $book)
    {
        $this->authorize('updateBorrow', $book);

        $book->users()->updateExistingPivot($user->id, [
            'returned_date' => now(),
        ]);

        $book->quantity += 1;
        $book->save();

        return redirect()->route('books.borrows.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user, Book $book)
    {
        $book->users()->detach($user->id);

        $book->quantity += 1;
        $book->save();

        return redirect()->route('books.borrows.index');
    }

    /**
     * Updated the book status as returned
     *
     * @param \App\Models\Book $book
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     *
     */
    public function confirm(User $user, Book $book)
    {
        return view('admin.borrows.borrow-books-delete', ['user' => $user, 'book' => $book]);
    }

}

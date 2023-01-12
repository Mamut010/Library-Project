<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorrowsHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminBorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        Gate::authorize('books.borrows.read');

        $records = BorrowsHistory::with('book')->with('user')->orderBy('borrowed_date', 'DESC')->simplePaginate(5);

        return view('admin.borrows.borrow-books-index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\BorrowsHistory $record
     * @return \Illuminate\Http\Response
     */
    public function update(BorrowsHistory $record)
    {
        DB::table('borrows_history')->where('id', $record->id)->update([
            'returned_date' => now(),
        ]);

        return redirect()->route('records.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorrowsHistory $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowsHistory $record)
    {
        DB::table('borrows_history')->where('id', $record->id)->delete();

        return redirect()->route('records.index')->with('success','The record has been deleted successfully');
    }

    /**
     * Show the confirm page.
     *
     * @param  \App\Models\BorrowsHistory $record
     * @return \Illuminate\Http\Response
     */
    public function confirm(BorrowsHistory $record)
    {
        return view('admin.borrows.borrow-books-delete')
            ->with('record', $record);
    }
}

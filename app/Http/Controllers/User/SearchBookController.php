<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Booktype;

class SearchBookController extends Controller
{
    /**
     * Display search page
     * 
     * @return \Illuminate\Http\Response
     */

    public function showClientAdvanceSearchPage()
    {
        $this->authorize('viewAny', Book::class);
        
        $booktypes = Booktype::all();

        return view('user.search.advanced', ['booktypes' => $booktypes]);
    }

    /**
     * Display search result
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function clientSearch(Request $request)
    {
        $this->authorize('viewAny', Book::class);

        $param = $request->all();
        
        $books = Book::filter($param)
                     ->orderBy('updated_at', 'DESC')
                     ->paginate(10)
                     ->withQueryString();

        return view('user.search.display', ['books' => $books]);
    }

    /**
     * Display search page
     * 
     * @return \Illuminate\Http\Response
     */

    public function showAdminAdvanceSearchPage()
    {
        $this->authorize('viewAny', Book::class);
        
        $booktypes = Booktype::all();

        return view('user.search.admin-advanced', ['booktypes' => $booktypes]);
    }

    /**
     * Display search result
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function adminSearch(Request $request)
    {
        $this->authorize('viewAny', Book::class);

        $param = $request->all();
        
        $books = Book::filter($param)
                     ->orderBy('updated_at', 'DESC')
                     ->paginate(10)
                     ->withQueryString();

        return view('user.search.admin-display', ['books' => $books]);
    }
}

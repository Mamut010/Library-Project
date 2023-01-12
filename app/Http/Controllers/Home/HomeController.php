<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Display about home page
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offset = 0;
        $limit = 8;
        $books = Book::withAvg('feedbacks as average_rating', 'rating')
                     ->orderBy('average_rating', 'DESC')
                     ->offset($offset)
                     ->limit($limit)
                     ->get();

        if(auth()->guest()) {
            return view('user.home-guest', ['books' => $books]);
        }
        else {
            return view('user.home-logged', ['books' => $books]);
        }
    }

    /**
     * Display intro page to books index
     * 
     * @return \Illuminate\Http\Response
     */
    public function booksIntro()
    {
        $offset = 0;
        $limit = 30;
        $books = Book::available()->orderBy('updated_at', 'DESC')
                                  ->offset($offset)
                                  ->limit($limit)
                                  ->get()
                                  ->random(3);

        return view('user.books-intro', ['books' => $books]);
    }
}

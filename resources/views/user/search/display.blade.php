<x-layouts.default-layout title="Search Result" selected="Book">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/Booklist.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/searchall.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/list_of_type_book.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/pagination.css') }}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Raleway"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </x-slot>
  
    <x-slot:content>
        <div class="backgroundsearchbook1">
            <div class="title">
                <div class="title_name">
                    <h1> Search book </h1>
                </div>
            </div>
            <hr style="color: rgb(0, 0, 0); width: 100%">
            <div class="searchbar_area">
                <div class="searchbar_container">
                    <form action="{{ route('books.search') }}" method="get">
                        @csrf

                        <div class="center">
                            <label for="booksearchpage"> <b>Search </b></label>
                            <input type="text" id="booksearchpage" name="title" placeholder="Title">
                            {{-- <button type="submit"> <b>Search </b></button> --}}
                            <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="advancesearch_button">
                    <a href="{{ route('books.advanced-search-page') }}"> Advance search <i class="fa-solid fa-caret-down"></i> </a>
                </div>
                <hr style="color: white; width: 100%;margin-bottom: 0%;">
                @isset($books)
                    <div class="here-is-the-table">
                        @if($books->isEmpty())
                            <p class="no-result-msg"><strong>No result found</strong></p>
                        @else
                            <table>
                                {{-- 
                                <tr>
                                    <th colspan="8"><h1 class="booklist">Booklist</h1></th>
                                </tr> 
                                --}}
                                <thead>
                                    <tr>
                                        <th style="width:20%">Cover Image</th>
                                        <th style="width:15%">Title</th>
                                        <th style="width:15%">Author</th>
                                        <th style="width:10%">Publication Year</th>
                                        <th style="width:10%">Type</th>
                                        <th style="width:15%">Rating</th>
                                        <th style="width:15%">Status</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>
                                            <a href="{{ route('books.show', ['book' => $book]) }}">
                                                <img class="book-image" src="{{ $book->cover_image }}" class="imgageintable">
                                            </a>
                                        </td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->publication_year }}</td>
                                        <td>{{ booktypesString($book->booktypes) }}</td>
                                        <td>{{ bookAvgRating($book) }}</td>
                                        <td>{{ $book->status }}</td>
                                    </tr> 
                                @endforeach
                                </tbody>
                            </table>
                            {{ $books->onEachSide(1)->links('components.util.pagination-links') }}
                        @endif
                    </div>
                @endisset
            </div>
        </div>
    </x-slot>
  </x-layouts.default-layout>
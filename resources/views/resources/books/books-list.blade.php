<x-layouts.default-layout title="Book List" selected="Admin">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/books-list.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/pagination.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/searchall.css') }}"/>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway&display=swap"
            rel="stylesheet"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway&display=swap"
            rel="stylesheet"
        />

        <script src="https://kit.fontawesome.com/884056f55a.js" crossorigin="anonymous"></script>
    </x-slot:links>

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
                    <form action="{{ route('books.search') }}" method="GET">
                        <div class="center">
                            <label> <b> Search </b></label>
                            <input type="text" id="booksearchpage" name="title" placeholder="Title " maxlength="40">
                            <button type="submit"> <b> Search </b></button>
                        </div>
                        <div class="advancesearch_button">
                            <a href="{{ route('books.advanced-search-page') }}" target="_self"> <b> Advance search </b> </a>
                        </div>
                    </form>
            <hr style="color: white; width: 100%;margin-bottom: 0%;">
            <div class="table-border">
                <div class="table-title">
                    <h1 class="booklist">Booklist</h1>
                </div>
                <div class="here-is-the-table">
                    @if($books->isEmpty())
                        <p style="text-align: center;"><strong>No result found</strong></p>
                    @else
                        @php
                            $books->loadAvg('feedbacks as average_rating', 'rating');
                        @endphp
                        <table>
                            <thead>
                            <tr>
                                <th style="width: 20%">Cover Image</th>
                                <th style="width: 15%">Title</th>
                                <th style="width: 15%">Author</th>
                                <th style="width: 10%">Publication Year</th>
                                <th style="width: 10%">Type</th>
                                <th style="width: 5%">Rating</th>
                                <th style="width: 5%">Status</th>
                                @can('books.update')
                                <th style="width:10%">Action</th>
                                @endcan
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>
                                        <a href="{{ route('books.show', ['book' => $book]) }}">
                                            <img class="book-image" src="{{ $book->cover_image }}" alt="{{ $book->title }}'s cover" style="max-width:200px; max-height:200px;">
                                        </a>
                                    </td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->publication_year }}</td>
                                    <td>{{ booktypesString($book->booktypes) }}</td>
                                    <td>{{ bookAvgRating($book) }}</td>
                                    <td>{{ $book->status }}</td>
                                    <td>
                                        @can('books.update')
                                            <a href="{{ route('books.edit', ['book' => $book]) }}"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
                                        @endcan
                                        @can('books.delete')
                                            <a href="{{ route('books.confirm', ['book' => $book]) }}"><i class="fa fa-trash"></i> Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination_bar">
                            {{ $books->onEachSide(1)->links('components.util.pagination-links') }}
                        </div>
                        <br>
                    @endif
                </div>
            </div>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layouts.default-layout>

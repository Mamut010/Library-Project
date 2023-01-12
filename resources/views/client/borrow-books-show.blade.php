<x-layouts.default-layout title="Borrow book" selected="Book">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/Borrowedbook.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/util.css') }}"/>
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
    </x-slot>
  
    <x-slot:content>
        <div class="flex-column">
            <div class="leftside">
                <div class="center">
                    <img src="{{ $book->cover_image }}" alt="{{ $book->title }}'s cover" class="book-image center-item shade">
                </div>
            </div>
            <div class="rightside">
                <form action="{{ route('users.books.borrows.destroy', ['book' => $book]) }}" method="post">
                    @csrf
                    @method('delete')

                    <a href="{{ route('books.show', ['book' => $book]) }}">
                        <img class="back-button" src="{{ asset('img/back-button.png') }}" alt="Back button">
                    </a>
                    <br>
                    <h1 class="heading">Borrow</h1>
                    <h2 class="book-title">{{ $book->title }}</h2>
                    <h3 class="author">{{ $book->author }}</h3>
                    <div class="setting-flex-in-form">
                        <div class="flex-column">
                            <div class="leftside">
                                <h3 class="info">From: {{ formatDate($borrow->borrowed_date) }}</h3>
                            </div>
    
                            <div class="rightside">
                                <h3 class="info">To: {{ formatDate($borrow->due_date) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="this-class-hold-borrow-button">
                        <input type="submit" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
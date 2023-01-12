<x-layouts.default-layout title="Borrow book" selected="Book">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/Borrowbook.css') }}"/>
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
                <form action="{{ route('users.books.borrows.store', ['book' => $book]) }}" method="post">
                    @csrf

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
                                <label for="borrowed_date" class="lable-form">From:</label><br>
                                <input type="date" id="borrowed_date" name="borrowed_date" value="{{ old('borrowed_date', $borrows->borrowed_date) }}" 
                                        min="{{ $borrows->borrowed_date }}" required><br>
                            </div>

                            <div class="rightside">
                                <label for="term" class="lable-form">For:</label><br>
                                <input type="number" id="term" name="term" value="{{ old('term', $term) }}" min="1" 
                                        max="{{ \App\Models\Borrow::BORROW_MAX_DAY }}" placeholder="1-{{ \App\Models\Borrow::BORROW_MAX_DAY }}" 
                                        required autocomplete="off">
                                <label class="lable-form">day(s)</label>
                            </div>
                        </div>
                    </div>
                    <div class="this-class-hold-borrow-button">
                        <input type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
<x-layouts.default-layout title="Book" selected="Book">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/book_shelf.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/animation-book_shelf.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Raleway"
        />
        <link
          href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway&display=swap"
          rel="stylesheet"
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
        <div class="container">
            <div class="container__title fade-in"><h2>Book Shelf</h2></div>
            <div class="container__desc fade-in">
                
            </div>
            <div class="container__search">
                <form action="{{ route('books.search') }}" method="get">
                    <div>
                        <input placeholder="Search" class="container__input stretch" name="title" autofocus/>
                    </div>
                </form>
            </div>
            <div class="container__book">
                <div class="book__container">
                    @foreach ($books as $book)
                        <div class="book__slot">
                            <div class="book__img">
                                <a href="{{ route('books.show', ['book' => $book]) }}">
                                    <img class="img__book fade-in" src="{{ $book->cover_image }}" alt="{{ $book->title }}'s cover" />
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('users.books.borrows.create', ['book' => $book]) }}">
                                    <button class="book__button fade-in-ttb">Borrow</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot:scripts type="text/javascript">
        @verbatim
            var text = 'Explore the collection';

            var textElements = text.split("").map(function(c) {
                    return $('<span>' + c + '</span>');
            });

            var el = $('.container__desc');
            var delay = 50; // Tune this for different letter delays.
            textElements.forEach(function(e, i) {
                el.append(e);
                e.hide();
                setTimeout(function() {
                    e.fadeIn(300)
                }, 100 + i * delay)
            });
        @endverbatim
    </x-slot>
  </x-layouts.default-layout>
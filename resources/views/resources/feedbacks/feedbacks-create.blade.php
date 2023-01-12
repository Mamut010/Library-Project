<x-layouts.default-layout title="Create feedback" selected="Book">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/Feedback-new.css') }}">
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
        <div class="bordermother">
            <div class="flex-column">
                
                <div class="leftside">
                    <img class="image-cover" src="{{ $book->cover_image }}" alt="{{ $book->title }}'s cover">
                </div>

                <div class="rightside">
                    <h1 class="book-title">{{ $book->title }}</h1>
                    <h2 class="author">{{ $book->author }}</h2>
                    <h3 class="normalthing">Written in: {{ $book->publication_year }}</h3>
                    <h3 class="normalthing">Rating: {{ bookAvgRating($book) }}</h3>
                </div>
                
            </div>

            <form class="comment-form" action="{{ route('books.feedbacks.store', ['book' => $book]) }}" method="post">
                @csrf

                <label for="rating">Your Rating:</label>
                <input type="number" id="rating" name="rating" min="1" max="10" value="{{ old('rating') }}" placeholder="1-10" 
                        required autocomplete="off" autofocus><br>
                        
                <label for="comment">Your Comment:</label><br>
                <textarea id="comment" name="comment" placeholder="Write your comment here...">{{ old('comment') }}</textarea>
                <div class="this-is-the-class-hold-class-button">
                    <div class="flex-column">
                        <div class="leftside-button">
                            <a href="{{ route('books.show', ['book' => $book]) }}">
                                <button type="button" class="back-button">Back</button>
                            </a>
                        </div>
                        <div class="rightside-button">
                            <input type="submit" class="submit-button">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-layouts.default-layout>
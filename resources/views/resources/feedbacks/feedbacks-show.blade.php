<x-layouts.default-layout title="Show feedback" selected="Book">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/Feedback-edit.css') }}">
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

            <form action="{{ route('books.feedbacks.destroy', ['book' => $book, 'feedback' => $feedback]) }}" method="post" id="form-delete">
                @csrf
                @method('delete')
            </form>

            <div class="comment-form">
                <label for="rating">Your Rating:</label>
                <input type="number" id="rating" name="rating" value="{{ $feedback->rating }}" readonly><br>

                <label>Your Comment:</label><br>
                <textarea id="comment" name="comment" readonly>{{ $feedback->comment }}</textarea>
                <div class="this-is-the-class-hold-class-button">
                    <div class="flex-column">
                        <div class="leftside-button">
                            <a href="{{ route('books.show', ['book' => $book]) }}">
                                <button type="button" class="button">Back</button>
                            </a>
                        </div>
                        <div class="middle-button">
                            <button type="submit" class="button" form="form-delete">
                                Delete
                            </button>
                        </div>
                        <div class="rightside-button">
                            <a href="{{ route('books.feedbacks.edit', ['book' => $book, 'feedback' => $feedback]) }}">
                                <button type="button" class="button">Edit</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
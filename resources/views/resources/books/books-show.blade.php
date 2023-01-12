<x-layouts.default-layout :title="$book->title" selected="Book">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/Booksample.css') }}"/>
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
        <div class="flex-collum">
            <div class="flex-row">
                <div class="leftside-inside"></div>
    
                <div class="rightside-inside">
                    <img class="book-image" src="{{ $book->cover_image }}" alt="{{ $book->title }}'s cover">
                    <h1 class="booktitle"><b>{{ $book->title }}</b></h1>
                    <p class="bookauthor">{{ $book->author }}</p>
                    <p class="aboutthebook1">Written in: {{ $book->publication_year }}</p>
                    <p class="aboutthebook1">Type: {{ booktypesString($book->booktypes) }}</p>
                    <div class="flex-row">
                        <div class="leftside-side-for-rating">
                            <p class="aboutthebook3">Rating: {{ bookAvgRating($book) }}</p>
                        </div>
                        <div class="rightside-side-for-status">
                            <p class="aboutthebook2">Status: {{ $book->status }}</p>
                        </div>
                    </div>
                    <p class="overview"><b>Overview</b></p>
                    <p class="overviewofoverview">
                        {{ $book->description }}
                    </p>
                    <div class="this-is-the-class-hold-class-button">
                        <div class="button">
                            {{-- Borrow button is enabled if the book is available OR the current user is borrowing the book --}}
                            @if (mb_strcasecmp($book->status, "Available") == 0 || $book->isUserBorrowing(auth()->user()))
                                <a href="{{ route('users.books.borrows.create', ['book' => $book]) }}">
                                    <button class="button-design">Borrow</button>
                                </a>
                            {{-- Otherwise, disable the button --}}
                            @else
                                <a href="{{ route('users.books.borrows.create', ['book' => $book]) }}" class="disabled">
                                    <button class="button-design">Borrow</button>
                                </a>
                            @endif

                            <a href="{{ route('books.feedbacks.create', ['book' => $book]) }}">
                                <button class="button-design">Feedback</button>
                            </a>
                        </div>
                    </div>
                    <div class="comment-section">
                        <h1 class="comment-heading">Comment Section:</h1>
                        {{-- Comment here --}}
                        @forelse($book->sortedFeedbacks as $feedback)
                            <div class="one-comment">
                                <div class="flex-collum">
                                    <div class="flex-row">
                                        <div class="leftside-comment-name">
                                            <p class="comment-person"><b>{{ $feedback->user->fullname }}</b></p>
                                        </div>
                                        
                                        <div class="rightside-comment-date">
                                            <p class="comment-person">Rating: {{ $feedback->rating }}</p>
                                            <p class="comment-person"><i>Date</i> {{ formatDate($feedback->updated_at, 'M j, Y') }}</p>
                                        </div>
                                    </div>
                                    <p class="finally-here-is-the-comment">
                                        {{ $feedback->comment }}
                                    </p>
                                </div>
                            </div>
                            @if($loop->iteration == 3 && !$loop->last)
                                <div class="button">
                                    <a href="{{ route('books.feedbacks.index', ['book' => $book]) }}"><button class="more-button-design">More</button></a>
                                </div>
                                @break
                            @endif
                        @empty
                            <div class="flex-collum">
                                <div class="flex-row">
                                    <div class="leftside-comment-name">
                                        <p class="comment-person"><b>No comment yet</b></p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="leftside-inside"></div>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
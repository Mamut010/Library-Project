<x-layouts.default-layout title="Book feedback" selected="Book">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/Comment-section.css') }}"/>
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
    </x-slot>

    <x-slot:content>
        <div class="flex-collum">
            <div class="flex-row">
                <div class="leftside-inside">
                    <div class="moving-leftside">
                        <img src="{{ $book->cover_image }}" alt="{{ $book->title }}'s cover" class="book-image">
                        <h1 class="booktitle"><b>{{ $book->title }}</b></h1>
                        <p class="bookauthor">{{ $book->author }}</p>
                        <p class="aboutthebook1">Written in: {{ $book->publication_year }}</p>
                        <p class="aboutthebook1">Type: {{ booktypesString($book->booktypes) }}</p>
                    </div>
                </div>
    
                <div class="rightside-inside">
                    <div class="comment-section">
                        <h1 class="comment-heading">Comment Section:</h1>
                        {{-- Comment here --}}
                        @forelse ($feedbacks as $feedback)
                            <div class="one-comment">
                                <div class="flex-row">
                                    <div class="leftside-comment-name">
                                        <p class="comment-person"><b>{{ $feedback->user->fullname }}</b></p>
                                    </div>                    
                                    <div class="rightside-comment-date">
                                        <p class="comment-person"><b>Rating: {{ $feedback->rating }}</b></p>
                                        <p class="comment-person"><i>Date {{ formatDate($feedback->updated_at, 'M j, Y') }}</i></p>
                                    </div>
                                </div>
                                <p class="finally-here-is-the-comment">
                                    {{ $feedback->comment }}
                                </p>
                            </div>
                        @empty
                            <div class="flex-row">
                                <div class="leftside-comment-name">
                                    <p class="comment-person"><b>No comment yet</b></p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    {{ $feedbacks->links('components.util.feedback-index-pagination') }}
                </div>

                <div class="leftside-inside">
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
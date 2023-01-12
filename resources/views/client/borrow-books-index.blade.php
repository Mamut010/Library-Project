<x-layouts.default-layout title="Borrow History" selected="User">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/history.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />
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
        <div class="borrow">
            <div class="borrowing">
                <div class="borrowing__title">
                    <h1>Borrowing</h1>
                </div>
                @if($records->isEmpty())
                    <p class="no-record-text">
                        <strong style="font-size: xx-large">No borrow records found</strong><br><br>
                        <small>Click <a href="{{ route('users.show', ['user' => auth()->user()]) }}" style="color:blue">here</a> to go back</small>
                    </p>
                @else
                    <div class="borrowing__table">
                        <table class="borrow__table">
                            <tr class="borrowing__table--title">
                                <th>Cover Image</th>
                                <th>Titles</th>
                                <th>Author</th>
                                <th>Borrowed Date</th>
                                <th>Due Date</th>
                                <th>Return Date</th>
                            </tr>
                            @foreach($records as $record)
                                <tr
                                    @if ($record->isExpired())
                                        class="outofdate"
                                    @elseif ($record->isReturned())
                                        class="checked_in"
                                    @else
                                        class="soonexpire"
                                    @endif
                                >
                                    <td> 
                                        <a href="{{ route('books.show', ['book' => $record->book]) }}" title="Click to view '{{ $record->book->title }}'">
                                            <img class="coverbook" src="{{ $record->book->cover_image }}" alt="{{ $record->book->title }}'s cover"/>
                                        </a>
                                    </td>
                                    <td> {{ $record->book->title }} </td>
                                    <td> {{ $record->book->author }} </td>
                                    <td> {{ formatDate($record->borrowed_date) }} </td>
                                    <td> {{ formatDate($record->due_date) }} </td>
                                    <td> {{ formatDate($record->returned_date) }} </td>
                                </tr>
                            @endforeach
                        </table>

                        {{ $records->links('components.util.pagination-links') }}
                    </div>
                @endif
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
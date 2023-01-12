<x-layouts.default-layout title="Borrow History" selected="Admin">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/BorrowHistory.css') }}"/>
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
    </x-slot:links>

    <x-slot:content>
        <div class="table-border">
            <div class="table-title">
                <h1 class="Borrow-History">Borrow History</h1>
            </div>
            <div class="here-is-the-table">
                @if($records->isEmpty())
                    <p style="text-align: center; font-size: xx-large; color:yellow;"><strong>No borrow records found</strong></p>
                @else
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 15%">Cover Image</th>
                                <th style="width: 15%">Title</th>
                                <th style="width: 15%">Borrower</th>
                                <th style="width: 15%">Mail</th>
                                <th style="width: 10%">Borrow Date</th>
                                <th style="width: 10%">Due Date</th>
                                <th style="width: 10%">Returned Date</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($records as $record)
                            <tr
                                @if ($record->isExpired())
                                    class="overdue"
                                @elseif ($record->isReturned())
                                    {{-- Not defined yet --}}
                                @else
                                    {{-- Not defined yet --}}
                                @endif
                            >
                                <td>
                                    <a href="{{ route('books.show', ['book' => $record->book]) }}" title="Click to view '{{ $record->book->title }}'">
                                        <img class="book-image" src="{{ $record->book->cover_image }}" alt="{{ $record->book->title }}'s cover">
                                    </a>
                                </td>
                                <td> {{ $record->book->title }} </td>
                                <td> {{ $record->user->username }} </td>
                                <td> {{ $record->user->email }} </td>
                                <td> {{ formatDate($record->borrowed_date) }} </td>
                                <td> {{ formatDate($record->due_date) }} </td>
                                <td> {{ formatDate($record->returned_date) }} </td>
                                <td>
                                    <form action="{{ route('books.borrows.return', ['book' => $record->book, 'user' => $record->user]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
    
                                        @if(!($record->isReturned()))
                                            <i class="fa-solid fa-inbox-in"></i><input type="submit" name="return" value="Return Book"
                                                   onclick="return confirm('Confirm that the book has been successfully returned to the library?');">
                                        @endif
                                    </form><br>
                                    <a href="{{ route('books.borrows.confirm', ['user' => $record->user, 'book' => $record->book])}}"><i class="fa-solid fa-trash-can"></i> Delete</a><br><br>
    {{--                                @if($record->due_date <= now())--}}
                                        <a href="{{ route('books.borrows.email', ['user' => $record->user]) }}"><i class="fa-solid fa-envelope"></i> Send</a><br>
    {{--                                @endif--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="flex-button">
                        {{ $records->onEachSide(1)->links('components.util.pagination-links') }}
                    </div>
                @endif
            </div>
        </div>
    </x-slot:content>
</x-layouts.default-layout>

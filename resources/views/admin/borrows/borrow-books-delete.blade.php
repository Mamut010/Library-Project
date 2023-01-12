<x-layouts.default-layout title="Book Delete Confirmation" selected="Admin">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/books-delete.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
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
        <div id="bordermother">
            <a href="{{ url()->previous() }}" title="Back">
                    <img class="back-button" src="https://www.seekpng.com/png/detail/87-875958_back-arrow-in-circle-symbol.png">
                </a><br>
                <h1 class="manage-heading">Delete Record</h1>
                <div class="warning">
                    <b>
                        This action cannot be undone.<br>Are you sure about this action?
                    </b>
                </div>
                <form action="{{ route('books.borrows.delete', ['user' => $user, 'book' => $book]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete Record" onclick="alert('The record has been deleted!\nReturning to the book history...')">
            </form>
        </div>
    </x-slot:content>
</x-layouts.default-layout>

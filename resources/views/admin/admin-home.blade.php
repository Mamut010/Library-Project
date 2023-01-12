<x-layouts.default-layout title="Admin Home" selected="Admin">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Raleway"
        />
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway&display=swap"
            rel="stylesheet"
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
        <div class="background_body">
            <div class="background_admin">
                <div class="heading">
                    <h1>  Welcome <br> Admin </h1>
                </div>
                <div class="admin_page_button">
                    <a href="{{ route('admin.books.search') }}" class="menu">Book List</a><br>
                    <a href="{{ route('books.create') }}" class="menu">Add Book</a><br>
                    <a href="{{ route('booktypes.index') }}" class="menu">Book Type List</a><br>
                    <a href="{{ route('books.borrows.index') }}" class="menu">Borrow History</a><br>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layouts.default-layout>

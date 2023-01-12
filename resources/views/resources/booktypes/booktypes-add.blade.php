<x-layouts.default-layout title="Add Book Type" selected="Admin">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/booktypes-add.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/booktypes-layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

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
        <div class="background_type_book_page">
            <div class="background_type_book_list">
                <div class="title_type_book">
                    <div class="title_name_type_book">
                        <h1><b> Add Book Type</b></h1>
                    </div>
                </div>
                <hr style="color: rgb(0, 0, 0); width: 100%">
                <div class="add_book_area">
                    <form action="{{ route('booktypes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
{{--                    <form action="{{ route('booktypes.store') }}" method="POST" enctype="multipart/form-data">--}}
                        <div class="add_book_area_name">
                            <label for="name">    <b> Name </b>    </label>
                            <input type="text" id="name" name="name" placeholder="Enter a name for the new book type..." maxlength="30" required><br>
                            <small></small>
                        </div>
                        <div class="add_book_area_description">
                            <label for="description">    <b> Description </b>    </label>
                            <textarea id="description" name="description" placeholder="Add some description here" maxlength="500"></textarea><br>
                            <small></small>
                            <button type="reset" title="Undo" > <b> &#8635 </b></button>
                        </div>
                        <button type="submit"> <b> Add </b></button>
                        <a href="{{ route('booktypes.index') }}"> <b>  Back  </b> </a>
{{--                        <a href="{{ route('booktypes.index') }}"> <b>  Back  </b> </a>--}}
                    </form>
                </div>
                <span>
            <br>
            <br>
            <br>
        </span>
            </div>
        </div>
    </x-slot:content>
</x-layouts.default-layout>

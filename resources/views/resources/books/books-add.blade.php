<x-layouts.default-layout title="Add Book" selected="Admin">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/books-add.css') }}"/>
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

    <x-slot:scripts language="JavaScript">
        @verbatim
            function toggleSelect(target) {
                checkboxes = document.getElementsByName('booktype_ids[]');
                for(var i=0, n=checkboxes.length; i < n; i++) {
                    checkboxes[i].checked = target.checked;
                }
            }
        @endverbatim
    </x-slot>

    <x-slot:content>
        <div id="bordermother">
            <a href="{{ url()->previous() }}" title="Back">
                <img class="back-button" src="https://www.seekpng.com/png/detail/87-875958_back-arrow-in-circle-symbol.png">
            </a><br>
            <h1 class="manage-heading">Add Book</h1>
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="flex-row">
                    <div class="leftside">
                        <label for="name">Title</label><br>
                        <input type="text" name="title" id="title" required><br>
                        <span><small></small></span><br>
                        <label for="pub">Publication Year</label><br>
                        <input type="number" min="1" max="2022" step="1" name="publication_year" id="publication_year" value="{{ $book->publication_year ?? '' }}" required><br>
                        <span><small></small></span><br>
                    </div>

                    <div class="rightside">
                        <label for="author">Author</label><br>
                        <input type="text" name="author" id="author" required><br>
                        <span><small></small></span><br>
                        <label for="quantity">Quantity</label><br>
                        <input type="number" min="1" max="9" step="1" name="quantity" id="quantity" required><br>
                        <span><small></small></span><br>
                    </div>
                </div>

                <div class="testalign">
                    <label for="img">Cover Image</label><br>
                    <input type="file" id="cover-image" name="cover-image"><br><br>
                    <span><small></small></span><br>
                    <div class="booktype">
                        <div>Types of Book</div>
                        <div class="container">
                            <input type="checkbox" onclick="toggleSelect(this)"> none<br>
                            @foreach($booktypes as $id => $display)
                                <input type="checkbox" id="booktype_ids" name="booktype_ids[]" value="{{ $id }}" {{ (isset($bookBooktypes) && (\Illuminate\Support\Facades\DB::table('book_booktype')->where('book_id', $book->id)->where('booktype_id', $id)->get()->first() != null)) ? 'checked' : '' }}>
                                <label for="booktype_ids">{{ $display }}</label><br>
                            @endforeach
                        </div>
                    </div>
                    <span><small></small></span><br>
                    <label for="description">Description</label>
                    <textarea name="description"
                              id="description"
                              placeholder="Add some description here..."
                              rows="4"
                              cols="50"
                              style="resize: none;"></textarea><br>
                    <input type="submit" value="Add">
                </div>
            </form>
        </div>
    </x-slot:content>
</x-layouts.default-layout>

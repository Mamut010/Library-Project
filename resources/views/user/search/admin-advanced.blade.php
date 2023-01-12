<x-layouts.default-layout title="Search Result" selected="Admin">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/searchall.css') }}"/>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </x-slot>
  
    <x-slot:content>
        <div class="background">
            <div class="backgroundsearchbook2">
                <div class="title">
                    <div class="title_name">
                        <h1> Search book </h1>
                    </div>
                </div>
                <div class="searchbar_area">
                    <div class="searchbar_container">
                        <form action="{{ route('admin.books.search') }}" method="get">
                            @csrf

                            <div class="center">
                                <label for="booksearchpage"><b>Search</b> </label>
                                <input type="text" id="booksearchpage" name="title" placeholder="Title">
                                <button type="submit" class="btn-search"><i class="fa fa-search"></i></button>
                            </div>
                            <div class="advancesearch_button">
                                <a href="{{ route('admin.books.advanced-search-page') }}"> <b> Advance search </b> <i class="fa-solid fa-caret-down"></i> </a>
                            </div>
                            <hr style="color: black; width: 100%">
                            <div class="advancesearch_area">
                                <div class="advancesearch_area_input_text">
                                    <div class="advancesearch_area_input_text_row">
                                        <div class="advancesearch_area_input_text_column">
                                            <label for="author">    <b> Author: </b>    </label>
                                            <input type="text" id="author" name="author">
                                        </div>
                                        <div class="advancesearch_area_input_text_column">
                                            <label for="publication_year">  <b> Publication Year: </b>  </label>
                                            <input type="number" id="publication_year" name="publication_year" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="advancesearch_area_checkbox1"> 
                                <h1>  Status:  </h1>
                                <label> 
                                    <input type="checkbox" name="status[]" value="1" style="margin-left: 15%;"> 
                                    <b> Available </b> 
                                </label>
                                <label> 
                                    <input type="checkbox" name="status[]" value="-1">
                                    <b>  Unavailable </b> 
                                </label>
                            </div>
                            <div class="advancesearch_area_checkbox2">
                                <div class="advancesearch_area_checkbox2_input">
                                    <h1 style="text-align: left;"> <b>Type: </b> </h1>
                                    <div class="advancesearch_area_checkbox2_input_tick">
                                        @foreach ($booktypes as $booktype)
                                            <label > 
                                                <input type="checkbox" name="booktypes[]" value="{{ $booktype->id }}"> <b> {{ $booktype->name }} </b> 
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <span>
                    <br>
                    <br>
                    <br>
                </span>
            </div>
        </div>
    </x-slot>
  </x-layouts.default-layout>
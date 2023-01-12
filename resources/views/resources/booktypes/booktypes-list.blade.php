<x-layouts.default-layout title="Booktype List" selected="Admin">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/booktypes-list.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/booktypes-layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/pagination.css') }}"/>
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

    <script src="https://kit.fontawesome.com/884056f55a.js" crossorigin="anonymous"></script>

    <x-slot:content>
        <div class="background_type_book_page">
            <div class="background_type_book_list">
                @if($booktypes->isEmpty())
                    <p>Sorry, no result found T.T</p>
                @else
                    <div class="title_type_book">
                        <div class="title_name_type_book">
                            <h1><b>List of book type</b></h1>
                        </div>
                    </div>
                    <hr style="color: rgb(0, 0, 0); width: 100%">
                    <div class="list_of_type_book_area ">
                        <div class="list_of_type_book_container">
                            <h1>  Type of book  </h1>
                            <table>
                                <tr>
                                    <th style="width: 15%;">  Name  </th>
                                    <th style="width: 65%;">  Description  </th>
    {{--                                @can('booktypes.update')--}}
                                        <th style="width: 20%;" colspan="2">  Action </th>
    {{--                                @endcan--}}
                                </tr>
                                @foreach ($booktypes as $booktype)
                                    <tr>
                                        <td>{{ $booktype->name }}</td>
                                        <td style="text-align: left; padding-left: 1%;">{{ $booktype->description }}</td>
{{--                                        @can('booktypes.update')--}}
{{--                                            <td><a href="{{ route('booktypes.edit', ['booktype' => $booktype]) }}" target="_self"><i class="fa-solid fa-pen-to-square"></i><b>Edit</b> </a> </td>--}}
                                            <td><a href="{{ route('booktypes.edit', ['booktype' => $booktype]) }}"><i class="fa-solid fa-pen-to-square"></i><b>Edit</b> </a> </td>
{{--                                        @endcan--}}
{{--                                        @can('booktypes.delete')--}}
{{--                                            <td><a href="{{ route('booktypes.confirm', ['booktype' => $booktype]) }}" target="_self"><i class="fa fa-trash"></i><b>Trash</b> </a> </td>--}}
                                            <td><a href="{{ route('booktypes.confirm', ['booktype' => $booktype]) }}"><i class="fa fa-trash"></i><b>Trash</b> </a> </td>
{{--                                        @endcan--}}
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div><br><br>
                    <div class="pagination_bar">
                        {{ $booktypes->links('components.util.pagination-links') }}
                    </div>
                    <div class="button_area">
{{--                        <a href="{{ route('booktypes.create') }}" target="_self"> <b> Add New Type </b> </a>--}}
                        <a href="{{ route('booktypes.create') }}"> <b> Add New Type </b> </a>
                    </div>
                    <span>
                        <br>
                        <br>
                        <br>
                    </span>
                @endif
            </div>
        </div>
    </x-slot:content>
</x-layouts.default-layout>

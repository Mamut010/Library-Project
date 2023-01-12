<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ $title }}</title>

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Bootstrap's link 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"/>
        --}}

        {{-- Links for header & footer 
        <link rel="stylesheet" href=" {{ asset('css/layout.css') }} ">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        --}}

        {{-- Additional links --}}
        @isset($links)
            {{ $links }}
        @endisset

        {{-- Script to improve scrolling behavior --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {
            
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();
            
                // Store hash
                var hash = this.hash;
            
                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
            
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
                } // End if
            });
            });
        </script>
    </head>

    <body {{ $attributes }} >
        <div {{ $layoutAttributes ?? 'id=home' }}>
            {{-- Header zone --}}
            <x-layouts.header :selected="$selected" id="header"/>

            {{-- Main content --}}
            {{ $content }}

            {{-- Additional content --}}
            {{ $slot }}

            {{-- Footer zone --}}
            <x-layouts.footer id="footer"/>

            {{-- Script zone --}}
            @isset($scripts)
                <script {{ $scripts->attributes }}>
                    {{ $scripts }}
                </script>
            @endisset
        </div>
    </body>
</html>
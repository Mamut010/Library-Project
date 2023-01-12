@if ($paginator->hasPages())
    <div class="pagination_bar">
        {{-- To First Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="pagination_bar_current disabled">
                <span> &#60;&#60; </span>
            </div>
        @else
            <a href="{{ $paginator->url(1) }}"> &#60;&#60; </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="pagination_bar_dots disabled">
                    <span><b>...</b> </span>
                </div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <div class="pagination_bar_current disabled">
                            <span><b>{{ $page }}</b> </span>
                        </div>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- To Last Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->url($paginator->lastPage()) }}"> &#62;&#62; </a>
        @else
            <div class="pagination_bar_current disabled">
                <span> &#62;&#62; </span>
            </div>
        @endif
    </div>
@endif
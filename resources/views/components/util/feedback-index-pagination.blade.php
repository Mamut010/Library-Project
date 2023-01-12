@if ($paginator->hasPages())
    <div class="flex-button">
        {{-- To Next Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="left-button">
                <button class="here-is-the-button disabled">Back</button>
            </div>
        @else
            <div class="left-button">
                <a href="{{ $paginator->previousPageUrl() }}"><button class="here-is-the-button">Back</button></a>
            </div>
        @endif

        {{-- To Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="right-button">
                <a href="{{ $paginator->nextPageUrl() }}"><button class="here-is-the-button">Next</button></a>
            </div>
        @else
            <div class="right-button">
                <button class="here-is-the-button disabled">Next</button>
            </div>
        @endif
    </div>
@endif
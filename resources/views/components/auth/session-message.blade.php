<span class="notice">
    @if(session()->has('error') || session()->has('warning') || session()->has('success'))
        @if(session('error'))
            <small style="visibility:visible; color:red">Error: {{ session('error') }}</small>
        @elseif(session()->has('warning'))
            <small style="visibility:visible; color:yellow">Warning: {{ session('warning') }}</small>
        @elseif(session()->has('success'))
            <small style="visibility:visible; color:green">Notice: {{ session('success') }}</small>
        @endif
    @endif
</span>
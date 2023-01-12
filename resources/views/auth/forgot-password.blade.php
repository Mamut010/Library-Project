<x-layouts.default-layout title="Forgot password">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/auth-style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
    </x-slot>

    <x-slot:content>
        {{-- Body zone: Edit every body part here --}}
        <div class="page-body page-background-img height-vh">
            <div class="middle-box height-forgot-password">
                <h1 class="text-align confirmation-content">Find your account</h1>
                <form action="{{ route('password.email') }}" method="post">
                    @csrf

                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}">
                        <x-auth.input-error-message name="email"/>
                    </div>
                    <div>
                        <p class="form-control sent-notice">
                            <x-auth.session-message/>
                        </p>
                    </div>
                    <div class="form-control text-align middle-margin button-size">
                        <button class="submit-btn" type="submit">
                            Send link
                        </button>
                    </div>

                    <h5 class="margin-top text-align"> 
                        Back to <a href="{{ route('login') }}"><span class="link-btn">login</span></a>
                    </h5>
                </form>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
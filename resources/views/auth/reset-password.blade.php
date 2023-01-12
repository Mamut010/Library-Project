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
        <div class="page-body page-background-img margin-auto height-vh">
            <div class="middle-box sign-in-height">
                <span class = "heading">
                    <h1>Reset Password </h1>
                </span>  
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input id="token" type="hidden" name="token" value="{{ $token }}"/>
                    <input id="email" type="hidden" name="email" value="{{ $email }}"/>

                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <x-auth.input-error-message name="password"/>
                    </div>
                    <div class="form-control">
                        <label for="password_confirmation">New password confirmation</label>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                        <x-auth.input-error-message name="password_confirmation"/>
                    </div>

                    <div class="form-control">
                        <button type="submit" class="submit-btn sign-in-btn">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
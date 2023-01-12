<x-layouts.default-layout title="Sign in">
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
            <div class="middle-box sign-in-height">
                <span class = "heading">
                    <h1>Sign-in</h1>
                </span>  
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-control">
                        <label for="username">Username or email</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}">
                        <x-auth.input-error-message name="username"/>
                    </div>
                    <div class="form-control">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        <x-auth.input-error-message name="password"/>
                    </div>
                    
                    <div class="form-control">
                        <span class="margin-auto">
                        <input type="checkbox" id="remember-me" name="remember-me" value="1">
                        <label for="remember-me">Remember me</label>
                        </span>
                    </div>

                    <div class="form-control">
                        <button type="submit" class="submit-btn sign-in-btn">Sign-in</button>
                    </div>
                    <h5 class="margin-top text-align"> 
                        Forgot the password? <a href="{{ route('password.forgot') }}"><span class="link-btn">Click here</span></a>
                    </h5>
                    <h5 class="margin-top text-align"> 
                        Don't have an account? <a href="{{ route('register') }}"><span class="link-btn">Sign up here</span></a>
                    </h5>
                </form>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
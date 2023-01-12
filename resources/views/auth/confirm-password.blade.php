<x-layouts.default-layout title="Confirm password">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/confirm_pass.css') }}">
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
        <div class="coverform">
            <div class="form__Curpass">
                <h1>Confirm Password</h1>
                <div class="annouce">
                    <span>Before continuing, please confirm your current password</span>
                </div>
                <br>
                <form action="{{ route('password.confirm') }}" method="post">
                    @csrf

                    <label for="password">Current password</label>
                    <br />
                    <input type="password" id="password" name="password"/>
                    <br />
                    <div class="error">
                        <x-validation.input-error-message name="password"/>
                    </div>
                    <br>
                    <br />
                    <input type="submit" value="Confirm" />
                </form>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
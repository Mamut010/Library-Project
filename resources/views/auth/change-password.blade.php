<x-layouts.default-layout title="Change password" selected="User">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/change_pass.css') }}">
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
            <div class="form__changedPassword">
            <h1>Change Password</h1>
            <div class="annouce">
                <p>
                    <strong>
                        It's a good idea to change a password that you don't use elsewhere.
                    </strong> 
                    <br>
                    <small>
                        <i>(After a successful password update, you will be redirected to the login page where you can log in with your new password)</i>
                    </small>
                </p>
            </div>
            <br>
            <form action="{{ route('password.change') }}" method="post">
                @csrf

                <label for="password">Input your new password (at least 8 characters)</label>
                <br>
                <input type="password" id="password" name="password">
                <br>
                <div class="error">
                    <x-validation.input-error-message name="password"/>
                </div>
                <br>
                <br>
                <label for="password_confirmation">Retype your new password</label>
                <br>
                <input type="password" id="password_confirmation" name="password_confirmation">
                <br>
                <div class="error">
                    <x-validation.input-error-message name="password_confirmation"/>
                </div>
                <br>
                <br>
                <input type="submit" value="Save changes">
                </div>
            </form>
        </div>
    </x-slot>
</x-layouts.default-layout>
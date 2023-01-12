<x-layouts.default-layout title="Verify email">
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
            <div class="middle-box text-align height-480px">
                <img class="email-image" src="{{ asset('img/email-picture.jpg') }}" alt="email-image">
                <div>
                    <h2>Email confirmation</h2>
                    <p class="confirmation-content"> 
                        We have sent an email to your email address. After receiving the email, follow the link provided to complete the registration. 
                    </p>
                    <hr>
                    <h4 class = "highlight">
                        <form method="post" action="{{ route('verification.resend') }}">
                            @csrf

                            Did not receive the email yet? 
                            <button type="submit" class="btn-no-border">
                                <span class="link-btn">Resend verification email.</span>
                            </button>
                        </form>
                    </h4>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>
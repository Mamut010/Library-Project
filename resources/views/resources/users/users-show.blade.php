<x-layouts.default-layout title="Profile" selected="User">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}"/>
        <link rel="stylesheet" href="{{ asset('css/user-form.css') }}"/>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Raleway"
        />
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
            <div class="userform">
                <div class="displayinfo">
                    <h2>Display Info</h2>
                    <div class="annouce">
                        <span>Their profile card</span>
                    </div>
                    <div>
                        <label> <h4>Display name:</h4> {{ $user->fullname }}</label>
                        <br/><br/>
                        <label> <h4>ID:</h4> {{ $user->id }}</label>
                        <hr/>
                    </div>
                </div>

                <div class="accountform">
                    <h2>Account</h2>
                    <div class="annouce">
                        <span>The information they share with the community</span>
                    </div>
                    <br/>
                    <div>
                        <div class="annouce">
                            <label> <span>Email: </span>
                                @if(auth()->user()->id == $user->id)
                                    {{ $user->email }}
                                @else
                                    {{ maskEmailAddress($user->email) }}
                                @endif
                            </label>
                        </div>
                        <br/>

                        <label><b>First name: </b></label>
                        <br/>
                        <label>{{ $user->firstname }}</label>
                        <br/>
                        <br/>
                        <label><b>Last name: </b></label>
                        <br/>
                        <label>{{ $user->lastname }}</label>
                        <br/>
                        <br/>
                        <br/>
                        @if(auth()->user()->id == $user->id)
                            <div class="btn-grp">
                                <a href="{{ route('users.edit', ['user' => $user]) }}">
                                    <input type="button" value="Edit Info">
                                </a>
                                <a href="{{ route('users.books.borrows.index', ['user' => $user]) }}">
                                    <input type="button" value="Borrow History" style="margin-right: 1%;">
                                </a>
                                <a href="{{ route('password.change') }}">
                                    <input type="button" value="Change password" style="float: left;"/>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
  </x-layouts.default-layout>
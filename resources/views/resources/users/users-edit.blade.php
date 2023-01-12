<x-layouts.default-layout title="Edit Profile" selected="User">
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
                        <span>Your profile card is visible to all members of this site</span>
                    </div>
                    <div>
                        <label><h4>Display name:</h4> {{ $user->fullname }}</label>
                        <br /><br />
                        <label><h4>ID:</h4> {{ $user->id }}</label>
                        <hr/>
                    </div>
              </div>
      
              <div class="accountform">
                <h2>Account</h2>
                <div class="annouce">
                  <span
                    >Update & Edit the information you share with the community</span
                  >
                </div>
                <br />
                    <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="annouce">
                            <label> <span>Email: </span>{{ $user->email }}</label>
                        </div>
                        <br/>

                        <label for="firstname">First name: </label>
                        <br/>
                        <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $user->firstname) }}"/>
                        <br/>
                        <div class="error">
                            <x-validation.input-error-message name="firstname"/>
                        </div>
                        <br/>
                        <br/>
                        <label for="lastname">Last name:</label>
                        <br/>
                        <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $user->lastname) }}"/>
                        <br/>
                        <div class="error">
                            <x-validation.input-error-message name="lastname"/>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <div class="btn-grp">
                            <input type="submit" value="Update info" />
                            <a href="{{ route('users.show', ['user' => $user]) }}">
                                <input type="button" value="Back" style="float: left;">
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
  </x-layouts.default-layout>
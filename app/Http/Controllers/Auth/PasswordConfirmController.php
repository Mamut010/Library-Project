<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\PasswordConfirmationRequest;
use Illuminate\Support\Facades\Hash;

class PasswordConfirmController extends Controller
{
    public function showForm()
    {
        return view('auth.confirm-password');
    }

    public function handleForm(PasswordConfirmationRequest $request)
    {
        if (!Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => ['The provided password does not match our records']
            ]);
        }

        session()->passwordConfirmed();
     
        return redirect()->intended();
    }
}

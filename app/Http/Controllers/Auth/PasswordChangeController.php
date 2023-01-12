<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\PasswordChangeRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordChangeController extends Controller
{
    public function showForm()
    {
        return view('auth.change-password');
    }

    public function handleForm(PasswordChangeRequest $request)
    {
        $user = User::find($request->user()->id);
        $old_password = $user->password;
        $new_password = $request->password;

        // New password should be different from old password
        if(Hash::check($new_password, $old_password)) {
            return back()->withErrors([
                'password' => ['New password must be different from old password']
            ]);
        }

        $user->forceFill(['password' => Hash::make($new_password)])
             ->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

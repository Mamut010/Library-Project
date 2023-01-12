<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(User $user) {
        $data = array('name'=>"TinyProject Library");
        Mail::send('resources.mails.default-mail', $data, function($message) use($user) {
            $message->to($user->email, $user->fullname)->subject
            ('Book Borrow Status');
            $message->from(auth()->user()->email, auth()->user()->fullname . ' from TinyProject Library');
        });

        return redirect()->route('books.borrows.index');
    }
}

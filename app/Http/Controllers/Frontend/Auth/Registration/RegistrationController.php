<?php

namespace App\Http\Controllers\Frontend\Auth\Registration;

use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\MailController;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('Frontend.Auth.Registration.index');
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:3', 'max:8', 'confirmed'],

        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->verification_code = sha1(time());
        $user->save();
        $user->roles()->sync(['role_id' => 5]);

        Mail::send(
            'Mail.newuser',
            array(
                'userid' => $user->id,
                'username' => $user->username,
                'verification_code' => $user->verification_code,
            ),
            function ($message) use ($user) {
                $message->from('amanthicopypaste72@gmail.com');
                $message->to($user->email);
                $message->subject('Verify Email');
            }
        );

        return redirect()->route('frontend.login')
            ->with('register', 'You have successfully registered!! Please verify your email');
    }

    public function emailverify($verification_code)
    {
        $verifyUser = User::where('verification_code', $verification_code)->first();
        $verifyUser->is_verified = 1;
        $verifyUser->save();
        return redirect()->route('frontend.login')->with('success', 'Your e-mail is verified. You can now login.');
    }
}

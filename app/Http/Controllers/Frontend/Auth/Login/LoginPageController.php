<?php

namespace App\Http\Controllers\Frontend\Auth\Login;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginPageController extends Controller
{
    public function login()
    {
        return view('Frontend.Auth.Login.index');
    }

    public function forgotpassword()
    {
        return view('Frontend.Auth.Login.forgot');
    }

    public function resetpassword(Request $request, User $user)
    {
        // dd($request);
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'new_password' => ['required', 'string', 'min:3', 'max:8'],
            'confirm_password' => ['same:new_password'],
        ]);
        $user = User::where('email', $request->email)->first();
        // dd($user);
        if (empty($user)) {
            return redirect()->route('frontend.forgotpassword')->with('warning', 'There is no account in this email');
        } else {
            $user->password = Hash::make($request->confirm_password);
            $user->save();
            return redirect()->route('frontend.login')->with('success', 'Successfully reset your password');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session()->flush();
        return redirect()->route('frontend.home.index');
    }
}

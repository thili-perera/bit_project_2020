<?php

namespace App\Http\Controllers\Backend\Auth\Login;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function verify(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.home');
        } else {
            if (User::where('email', $request->email)->exists()) {
                return redirect()->route('login')
                    ->with('logerror', 'Email or Password is incorrect');
            } else {
                return redirect()->route('login')
                    ->with('logerror', 'There is no account in this email');
            }
        }
    }

    public function frontendverify(Request $request)
    {
        // dd($request);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $verified = User::where('email', $request->email)->with('roles')->first();
            foreach ($verified->roles as $role) {
                $rolename = $role->rname;

                if ($rolename == 'Customer') {
                    if ($verified->is_verified == 1) {
                        return redirect()->route('frontend.home.index');
                    } else {
                        return redirect()->route('frontend.login')->with('warning', 'Please verify your email first');
                    }
                } else {
                    return redirect()->route('frontend.home.index');
                }
            }
        } else {
            if (User::where('email', $request->email)->exists()) {
                return redirect()->route('frontend.login')
                    ->with('danger', 'Email or Password is incorrect');
            } else {
                return redirect()->route('frontend.login')
                    ->with('danger', 'There is no account in this email');
            }
        }
    }

    public function forgotpassword()
    {
        return view('Backend.Auth.Login.resetpassword');
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
            return redirect()->route('dashboard.forgotpassword')->with('logerror', 'There is no account in this email');
        } else {
            $user->password = Hash::make($request->confirm_password);
            $user->save();
            Alert::success('You have successfully reset your password..You can login now');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

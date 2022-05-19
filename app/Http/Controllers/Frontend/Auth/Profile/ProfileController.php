<?php

namespace App\Http\Controllers\Frontend\Auth\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('Frontend.Auth.Profile.index');
        } else {
            return redirect()->route('frontend.login');
        }
    }
}

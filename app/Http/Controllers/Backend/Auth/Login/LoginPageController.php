<?php

namespace App\Http\Controllers\Backend\Auth\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginPageController extends Controller
{
    public function login()
    {
        return view('Backend.Auth.Login.index');
    }
}

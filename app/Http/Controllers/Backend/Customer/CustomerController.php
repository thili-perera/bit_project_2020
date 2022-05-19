<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Model\Role;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Role::with('users')->where('rname', 'Customer')->get();
        // dd($customers);
        return view('Backend.CustomerManagement.index', compact('customers'));
    }
}

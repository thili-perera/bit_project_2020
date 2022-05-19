<?php

namespace App\Http\Controllers\Backend\Driver;

use App\Model\Role;
use App\Model\User;
use App\Model\Driver;
use App\Model\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Role::with('users')->where('rname', 'Delivery Officer')->first();
        $vehicles = Vehicle::with('user')->get();
        // dd($vehicles);


        return view('Backend.Driver.index', compact('drivers', 'vehicles'));
    }
}

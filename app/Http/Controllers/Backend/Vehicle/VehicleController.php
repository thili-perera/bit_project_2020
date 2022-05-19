<?php

namespace App\Http\Controllers\Backend\Vehicle;

use App\User;
use App\Model\Role;
use App\Model\Driver;
use App\Model\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('user')->get();
        // dd($vehicles);
        return view('Backend.Vehicle.index', compact('vehicles'));
    }
    public function create()
    {
        $drivers = Role::where('rname', 'Delivery Officer')->with('users')->get();
        // dd($users); 

        return view('Backend.Vehicle.create', compact('drivers'));
    }

    public function store(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'vehicle_number' => 'required',
            'type' => 'required',
            'driver' => 'required',
        ]);
        $vehicle = new Vehicle();
        $vehicle->vehicle_number = $request->vehicle_number;
        $vehicle->type = $request->type;
        $vehicle->user_id = $request->driver;
        $vehicle->save();

        Alert::success('Successfully added a new vehicle');
        return redirect()->route('dashboard.vehicle.index');
    }

    public function edit($id, Vehicle $vehicle)
    {
        $vehicle = Vehicle::where('id', $id)->with('user')->first();
        $selected_driver = $vehicle->user_id;
        $drivers = Role::where('rname', 'Delivery Officer')->with('users')->get();

        return view('Backend.Vehicle.edit', compact('vehicle', 'selected_driver', 'drivers'));
    }

    public function update($id, Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'vehicle_number' => 'required', 'sometimes',
            'type' => 'required', 'sometimes',
            'driver' => 'required', 'sometimes',
        ]);

        $vehicle = Vehicle::where('id', $id)->with('user')->first();
        $vehicle->vehicle_number = $request->vehicle_number;
        $vehicle->type = $request->type;
        $vehicle->user_id = $request->driver;
        $vehicle->save();

        Alert::success('Successfully updated vehicle');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::where('id', $id)->first();
        $vehicle->delete();

        Alert::success('Successfully updated vehicle');
        return redirect()->back();
    }
}

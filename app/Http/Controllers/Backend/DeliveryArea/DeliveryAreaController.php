<?php

namespace App\Http\Controllers\Backend\DeliveryArea;

use App\Model\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DeliveryAreaController extends Controller
{
    public function index()
    {
        $delivery_areas = District::all();
        return view('Backend.DeliveryArea.index', compact('delivery_areas'));
    }

    public function create()
    {
        return view('Backend.DeliveryArea.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'district_name' => 'required',
            'delivery_fee' => 'required', 'float',
        ]);

        $delivery_area = new District();
        $delivery_area->district = $request->district_name;
        $delivery_area->delivery_fee = $request->delivery_fee;
        $delivery_area->save();

        Alert::success('Delivery Area added successfully');
        return redirect()->route('dashboard.deliveryarea.index');
    }

    public function edit($id)
    {
        $delivery_area = District::where('id', $id)->first();
        return view('Backend.DeliveryArea.edit', compact('delivery_area'));
    }

    public function update($id, Request $request, District $delivery_area)
    {
        $request->validate([
            'district_name' => 'required',
            'delivery_fee' => 'required',
        ]);

        $delivery_area = District::where('id', $id)->first();
        $delivery_area->district = $request->district_name;
        $delivery_area->delivery_fee = $request->delivery_fee;
        $delivery_area->save();

        Alert::success('Delivery Area updated successfully');
        return redirect()->route('dashboard.deliveryarea.index');
    }

    public function destroy($id)
    {
        $delivery_area = District::where('id', $id)->first();
        $delivery_area->delete();
        Alert::success('Delivery Area Deleted Successfully');
        return redirect()->route('dashboard.deliveryarea.index');
    }
}

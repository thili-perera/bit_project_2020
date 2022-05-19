<?php

namespace App\Http\Controllers\Backend\Brand;

use App\Model\Brand;
use App\Model\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('Backend.Brand.index', compact('brands'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('Backend.Brand.create', compact('suppliers'));
    }

    public function store(Request $request, Brand $brand)
    {
        $brand = new Brand();
        $brand->brandname = $request->brandname;
        $brand->supplier_id = $request->supplier;
        $brand->save();

        Alert::success('New Brand added successfully');

        return redirect()->route('dashboard.brand.index');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        Alert::success('Brand deleted');
        return redirect()->route('dashboard.brand.index');
    }
}

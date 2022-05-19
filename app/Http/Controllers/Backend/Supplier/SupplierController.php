<?php

namespace App\Http\Controllers\Backend\Supplier;

use App\Model\Brand;
use App\Model\Supplier;
use App\Model\Inventory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Model\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('Backend.Supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('Backend.Supplier.create');
    }

    public function supplierproduct()
    {
        $suppliers = Supplier::all();

        return view('Backend.Supplier.supplierproduct', compact('suppliers'));
    }
    public function supplierproductFilter(Request $request)
    {
        // dd($request);
        $suppliers = Supplier::all();
        // $supplier_id = Supplier::where('id')
        $selected_supplier = $request->supplier;
        $brand = Brand::where('supplier_id', $request->supplier)->pluck('id')->first();
        $brand_products = Product::where('brand_id', $brand)->with('brand')->get();
        // dd($brand_products);

        if ($request->input('filter')) {
            return view('Backend.Supplier.supplierproduct', compact('suppliers', 'brand_products', 'selected_supplier'));
        }
    }

    public function show($id, Supplier $supplier)
    {
        $supplier = Supplier::where('id', $id)->first();
        $stocks = Inventory::where('supplier_id', $id)->get();
        return view('Backend.Supplier.show', compact('stocks', 'supplier'));
    }

    public function edit(Supplier $supplier)
    {

        return view('Backend.Supplier.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'sometimes'],
            'contact' => ['required', 'digits:10', 'numeric'],
            'email' => ['required', 'sometimes', Rule::unique('suppliers')->ignore($supplier->id)],
        ]);

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->contact = $request->contact;
        $supplier->save();

        Alert::success('Supplier updated successfully');
        return redirect()->route('dashboard.supplier.index');
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'contact' => 'required', 'digits:10', 'numeric',
            'email' => 'required', 'unique',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->contact = $request->contact;
        $supplier->email = $request->email;
        $supplier->save();

        Alert::success('Supplier added successfully');

        return redirect()->route('dashboard.supplier.index');
    }

    public function destroy($id)
    {
        // dd($supplier);
        $supplier = Supplier::find($id);
        $supplier->delete();

        Alert::success('Supplier Deleted Successfully');
        return redirect()->route('dashboard.supplier.index');
    }
}

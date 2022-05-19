<?php

namespace App\Http\Controllers\Backend\Inventory;

use App\Model\Product;
use App\Model\Supplier;
use App\Model\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with('supplier', 'product')->get();
        // dd($inventories);
        return view('Backend.Inventory.index', compact('inventories'));
    }

    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('Backend.Inventory.create', compact('products', 'suppliers'));
    }

    public function store(Request $request, Inventory $inventory)
    {
        // dd($request);
        $product = Product::where('id', $request->productid)->with('brand')->first();
        // dd($product);
        $supplier = $product->brand()->first();
        // dd($supplier);

        $inventory = new Inventory();
        $inventory->product_id = $request->productid;

        if ($supplier->supplier_id == $request->supplierid) {
            $inventory->supplier_id = $request->supplierid;
        } else {
            Alert::warning('The selected supplier for the product is incorrect', ' Please select the correct supplier');
            return redirect()->back();
        }
        $inventory->quantity = $request->qty;
        $inventory->save();

        $product->quantity = $product->quantity + $inventory->quantity;
        $product->save();
        Alert::success('successfully added new stock');
        return redirect()->back();
    }
}

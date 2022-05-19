<?php

namespace App\Http\Controllers\Backend\Product;

use App\Model\User;
use App\Model\Brand;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::with('categories', 'brand')->get();
        $brand = Brand::where('id', $products)->get();
        // dd($products);
        return view('Backend.ProductManagement.index', compact('products', 'brand'));
    }

    public function create()
    {
        $categories = Category::all();
        $productcategories = Category::where('parent_id', 0)->get();
        $products = Product::with('categories')->get();
        $brands = Brand::all();
        // dd($brands);
        return view('Backend.ProductManagement.create', compact('categories', 'productcategories', 'products', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proname' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
            'regularprice' => 'required',
            'content' => 'required', 'string', 'max:255',
            // 'quantity' => 'required',
            'weight' => 'required', 'string',
            'salesprice' => 'required',
            'image' => 'required',
            'cat_id' =>  'required|min:2',
        ]);

        // dd($request->image);
        $product = new Product();
        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $my_image);
            $product->image = $my_image;
        }

        $slug = Str::slug($request->proname, '-');
        $product->proname = $request->proname;
        $product->brand_id = $request->brandname;
        $product->description = $request->description;
        $product->regularprice = $request->regularprice;
        $product->content = $request->content;
        $product->quantity = 0;
        $product->weight = $request->weight;
        $product->salesprice = $request->salesprice;
        $product->slug = $slug;
        // dd($product);
        $product->save();

        $product->categories()->sync($request->cat_id);

        Alert::success('Product added successfully');
        return redirect()->route('dashboard.product.index');
    }

    public function show(Product $product)
    {
        return view('Backend.ProductManagement.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $products = Product::with('categories')->get();
        $brands = Brand::all();
        $brand = Brand::where('id', $product->brand_id)->first();
        $productcategories = Category::where('parent_id', 0)->get();
        // dd($products);
        return view('Backend.ProductManagement.edit', compact('product', 'productcategories', 'products', 'brands', 'brand'));
    }

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'proname' =>  'required', 'nullable ',
            'description' => 'required', 'nullable ',
            'regularprice' =>  'required', 'nullable ',
            'content' =>   'required', 'nullable ',
            // 'quantity' =>  'required', 'nullable ',
            'weight' => 'required', 'nullable ',
            'salesprice' =>  'required', 'nullable ',
            'image' => 'sometimes',
            'cat_id' =>  'required_without_all',
        ]);

        // dd($request);
        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/product'), $my_image);
            $product->image = $my_image;
        }
        $product->categories()->sync($request->cat_id);
        $slug = Str::slug($request->proname, '-');
        $product->proname = $request->proname;
        $product->description = $request->description;
        $product->regularprice = $request->regularprice;
        $product->brand_id = $request->brand_id;
        $product->content = $request->content;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->salesprice = $request->salesprice;
        $product->slug = $slug;
        $product->save();

        Alert::success('Product Updated Successfully');
        return redirect()->route('dashboard.product.index');
    }
    public function destroy(Product $product)
    {
        if ($product->image) {
            File::delete('upload/product' . $product->image);
        }

        $product->delete();
        Alert::success('Product Deleted Successfully');
        return redirect()->route('dashboard.product.index');
    }
}

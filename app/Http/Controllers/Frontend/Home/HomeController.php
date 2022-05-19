<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Model\Product;
use App\Model\Category;
use App\Model\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Product $product, Request $request, Category $category)
    {
        $user = Auth::user();
        // dd($user);
        // $request->session()->flush();
        $newproducts = Product::all()->take(12);
        $feature = Product::all()->take(12);
        $toys = Category::with('products')->where('catname', 'Toys & Hobbies')->get();
        $categories = Category::with('products')->where('parent_id', 0)->get();

        $sub = Category::with('children')->get();
        // dd($sub);

        $productcategories = Category::where('id', 16)->with('products')->first();
        // $product = Product::where()

        $subcategories = Category::with('products', 'children')->where('parent_id', $sub)->get();
        // dd($productcategories);

        return view('Frontend.Home.index', compact('newproducts', 'categories', 'subcategories', 'feature', 'productcategories'));
    }

    public function allproducts(Product $product, Request $request, Category $category)
    {
        $user = Auth::user();
        // dd($user);
        // $request->session()->flush();
        $products = Product::all();
        $categories = Category::with('products')->where('parent_id', 0)->get();
        $productcategories = Category::where('id', 16)->with('products')->first();
        // $product = Product::where()

        return view('Frontend.Home.allproducts', compact('products', 'categories', 'productcategories'));
    }

    public function search()
    {
        $search = \Request::get('search');
        $products = Product::where('proname', 'like', '%' . $search . '%')
            ->orderBy('proname')
            ->paginate(20);

        // dd($products);

        return view('Frontend.Category.search', compact('products', 'search'));
    }

    public function about()
    {
        return view('Frontend.Home.aboutus');
    }

    public function contact()
    {
        return view('Frontend.Home.contactus');
    }
}

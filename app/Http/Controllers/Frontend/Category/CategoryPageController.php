<?php

namespace App\Http\Controllers\Frontend\Category;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class CategoryPageController extends Controller
{
    public function catpage($slug)
    {
        // dd($slug);
        $categories = Category::where('slug', $slug)->with('products')->first();
        // $categoryh = Product::with('categories')->get();
        // dd($categories);
        return view('Frontend.Category.catpage', compact('categories'));
    }
}

<?php

namespace App\Http\Controllers\Backend\Product;

use App\Model\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Backend.CategoryManagement.index', compact('categories'));
    }
    public function create()
    {
        $parentcategories = Category::where('parent_id', 0)->get();
        return view('Backend.CategoryManagement.create', compact('parentcategories'));
    }
    public function parentstore(Request $request)
    {
        $parcategory = new Category();
        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/category'), $my_image);
            $parcategory->image = $my_image;
        }
        $slug = Str::slug($request->catname, '-');
        $parcategory->catname = $request->catname;
        $parcategory->description = $request->description;
        $parcategory->parent_id = 0;
        $parcategory->slug = $slug;
        $parcategory->save();

        Alert::success('Category added successfully ');
        return redirect()->route('dashboard.category.index');
    }

    public function substore(Request $request)
    {
        $category = new Category();

        $slug = Str::slug($request->catname, '-');
        $category->catname = $request->catname;
        $category->description = $request->description;
        $category->parent_id = $request->parentcategory;
        $category->slug = $slug;
        $category->save();

        Alert::success('Sub Category added successfully');
        return redirect()->route('dashboard.category.index');
    }

    public function edit(Category $category)
    {
        return view('Backend.CategoryManagement.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/category'), $my_image);
            $category->image = $my_image;
        }

        $slug = Str::slug($request->catname, '-');
        $category->catname = $request->catname;
        $category->description = $request->description;
        $category->slug = $slug;
        $category->save();

        Alert::success('Category updated successfully');
        return redirect()->route('dashboard.category.index');
    }

    public function show(Category $category)
    {
        return view('Backend.CategoryManagement.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        if ($category->image) {
            File::delete('upload/category' . $category->image);
        }

        $category->delete();
        Alert::success('Category Deleted Successfully');
        return redirect()->route('dashboard.category.index');
    }
}

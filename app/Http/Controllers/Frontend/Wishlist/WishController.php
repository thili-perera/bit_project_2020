<?php

namespace App\Http\Controllers\Frontend\Wishlist;

use App\Model\Product;
use App\Model\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class WishController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userid = Auth::id();
            $wishitems = Wishlist::where('user_id', $userid)->select('product_id')->get();
            // dd($wishitems);

            $products = Product::whereIn('id', $wishitems)->get();
            // dd($products);


            return view('Frontend.Wishlist.index2', compact('products'));
        } else {
            return redirect()->route('frontend.login');
        }
    }

    public function addTowish($id, Request $request)
    {
        // dd($request);
        if (Auth::check()) {
            $userid = Auth::id();
            $product = Product::where('slug', $id)->first();
            $productid = $product->id;
            // dd($productid);


            $wish = new Wishlist();
            $wish->user_id = $userid;

            if (Wishlist::where('product_id', $productid)->exists()) {
                return redirect()->back()
                    ->with('warning', 'The product has already been added to the wishlist');
                // dd('ok');
            } else {
                $wish->product_id = $productid;
                // dd('not ok');
            }

            // dd($wishitem->product_id);

            $wish->save();

            return redirect()->route('frontend.home.index')
                ->with('success', 'Product added to wishlist successfully');
        } else {
            // alert()->warning('WarningAlert', 'Lorem ipsum dolor sit amet.'); 
            return redirect()->back()->with('warning', 'Please login first');
        }
    }

    public function wishdelete($request)
    {
        // dd($request);
        // dd($id);
        // $wishid = Wishlist::where('product_id', $id)->select('id')->get();
        // dd($wishid);
        $wishid = Wishlist::where('product_id', $request)->first();

        $wishid->delete();
        return redirect()->route('frontend.wishlist.index')
            ->with('info', 'Wishlist item removed Successfully');
    }
}

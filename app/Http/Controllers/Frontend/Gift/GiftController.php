<?php

namespace App\Http\Controllers\Frontend\Gift;

use App\Model\Product;
use App\Model\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiftController extends Controller
{
    public function addTogift($id, Request $request)
    {
        // dd($request);
        // session()->flush();
        $product = Product::where('slug', $id)->first();
        $id = $product->id;
        if (!$product) {
            abort(404);
        }
        $gift = session()->get('gift');

        if (!$gift) {

            $gift  = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->proname,
                    "salesprice" => $product->salesprice,
                    "regularprice" => $product->regularprice,
                    "image" => $product->image,
                    "quantity" => 1,
                    "slug" => $product->slug,
                ]
            ];
            session()->put('gift', $gift);
            return redirect()->back()
                ->with('success', 'Product added to gift successfully');
        }
        //if item is alreay exist in the gift then increment it's quantity
        // if (isset($gift[$id])) {
        //     $gift[$id]['quantity']++;
        //     session()->put('gift', $gift);
        //     return redirect()->back()
        //         ->with('success', 'Product added to gift successfully');
        // }
        //if item is not exist in the gift
        $gift[$id]  = [

            "id" => $product->id,
            "name" => $product->proname,
            "salesprice" => $product->salesprice,
            "regularprice" => $product->regularprice,
            "image" => $product->image,
            "quantity" => 1,
            "slug" => $product->slug,
        ];
        session()->put('gift', $gift);

        return redirect()->back()
            ->with('success', 'Product added to gift successfully');
    }
    public function index()
    {

        // dd(session()->get('gift'));
        //$gift = session()->get('gift');
        return view('Frontend.Gifts.index');
    }

    public function updatequantity(Request $request)
    {
        if ($request->productid and $request->quantity) {
            $gift = session()->get('gift');
            $gift[$request->productid]['quantity'] = $request->quantity;

            session()->put('gift', $gift);
            return redirect()->route('frontend.gift.index')
                ->with('success', 'Quantity updated successfully');
        }
    }
    public function itemdelete(Request $request)
    {
        if ($request->productid) {
            if (Session::has('gift')) {
                $gift = session()->get('gift');
                if (isset($gift[$request->productid])) {
                    unset($gift[$request->productid]);
                    session()->put('gift', $gift);
                }
            }

            if ($request->input('topbar_gift_delete')) {
                return redirect()->route('frontend.home.index');
            } else {
                return redirect()->route('frontend.gift.index');
            }
        }
    }
}

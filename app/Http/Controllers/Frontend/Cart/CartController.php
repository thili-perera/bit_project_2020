<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Model\Product;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addTocart($id)
    {
        // dd($id);
        // session()->flush();
        if (Auth::check()) {
            $product = Product::where('slug', $id)->first();
            $id = $product->id;
            if (!$product) {
                abort(404);
            }
            $cart = session()->get('cart');

            if (!$cart) {

                $cart  = [
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
                session()->put('cart', $cart);
                return redirect()->back()
                    ->with('success', 'Product added to cart successfully');
            }
            //if item is alreay exist in the cart then increment it's quantity
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
                return redirect()->back()
                    ->with('success', 'Product added to cart successfully');
            }
            //if item is not exist in the cart
            $cart[$id]  = [

                "id" => $product->id,
                "name" => $product->proname,
                "salesprice" => $product->salesprice,
                "regularprice" => $product->regularprice,
                "image" => $product->image,
                "quantity" => 1,
                "slug" => $product->slug,
            ];
            session()->put('cart', $cart);

            return redirect()->back()
                ->with('success', 'Product added to cart successfully');
        } else {
            return redirect()->back()
                ->with('warning', 'Please login first');
        }
    }
    public function index()
    {

        // dd(session()->get('cart'));
        //$cart = session()->get('cart');
        return view('Frontend.Cart.index');
    }

    public function updatequantity(Request $request)
    {
        $product = Product::where('id', $request->productid)->first();
        if ($request->productid and $request->quantity) {
            if ($product->quantity - 2 >= $request->quantity) {
                $cart = session()->get('cart');
                $cart[$request->productid]['quantity'] = $request->quantity;

                session()->put('cart', $cart);
                return redirect()->route('frontend.cart.index')
                    ->with('success', 'Quantity updated successfully');
            } else {
                return redirect()->route('frontend.cart.index')
                    ->with('warning', 'The quantity you entered has exceeded');
            }
        }
    }
    public function itemdelete(Request $request)
    {
        if ($request->productid) {
            if (Session::has('cart')) {
                $cart = session()->get('cart');
                if (isset($cart[$request->productid])) {
                    unset($cart[$request->productid]);
                    session()->put('cart', $cart);
                }
            }

            if ($request->input('topbar_cart_delete')) {
                return redirect()->route('frontend.home.index');
            } else {
                return redirect()->route('frontend.cart.index');
            }
        }
    }
}

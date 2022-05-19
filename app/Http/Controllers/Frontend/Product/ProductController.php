<?php

namespace App\Http\Controllers\Frontend\Product;

use Carbon\Carbon;
use App\Model\User;
use App\Model\Order;
use App\Model\Review;
use App\Model\Product;
use App\Model\Category;
use App\Model\District;
use App\Model\Wishlist;
use App\Model\Order_Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($slug)
    {
        // dd($slug);
        $id = Auth::id();
        $user = User::where('id', $id)->get();
        $product = Product::where('slug', $slug)->with('categories', 'reviews')->first();
        $categories = $product->categories->where('parent_id', 0)->first();
        $reviews = $product->reviews;
        $rate = Review::where('user_id', $id)
            ->where('product_id', $product->id)
            ->first();

        $user_orders = Order::where('user_id', $id)->whereIn('status', ['delivered', 'received'])->pluck('id');
        $order_product = Order_Product::whereIn('order_id', $user_orders)
            ->where('product_id', $product->id)
            ->get();
        // dd($order_product);
        return view('Frontend.Product.index', compact('product', 'user', 'reviews', 'categories', 'rate', 'order_product'));
    }

    public function action(Request $request)
    {
        $quantity = $request->quantity;
        $product = Product::where('id', $request->product_id)->first();
        $districts = District::all();
        $id = $product->id;

        if ($product->quantity - 2 >= $request->quantity) {
            if ($request->input('buy')) {
                if (Auth::check()) {
                    // session()->forget('gift');
                    return view('Frontend.checkout.buy2', compact('product', 'quantity', 'districts'));
                } else {
                    return redirect()->route('frontend.login')
                        ->with('danger', 'Please login First');
                }
            }

            if ($request->input('cart')) {

                $product = Product::where('id', $request->product_id)->first();
                $id = $product->id;
                if (!$product) {
                    abort(404);
                }

                /* create a cart */
                $cart = session()->get('cart');

                if (!$cart) {

                    $cart  = [
                        $id => [
                            "id" => $product->id,
                            "name" => $product->proname,
                            "salesprice" => $product->salesprice,
                            "regularprice" => $product->regularprice,
                            "image" => $product->image,
                            "quantity" => $request->quantity,
                            "slug" => $product->slug,
                        ]
                    ];
                    session()->put('cart', $cart);
                    return redirect()->back()
                        ->with('success', 'Product added to cart successfully');
                }
                //if item is alreay exist in the cart then increment it's quantity
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] += $request->quantity;
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
                    "quantity" => $request->quantity,
                    "slug" => $product->slug,
                ];
                session()->put('cart', $cart);

                return redirect()->back()
                    ->with('success', 'Product added to cart successfully');
            }

            if ($request->input('gift')) {
                // dd('gift');
                if (3 <= count((array) session('gift'))) {
                    return redirect()->back()
                        ->with('success', 'Only 3 items can be added to a gift package');
                } else {

                    $product = Product::where('id', $request->product_id)->first();
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
                    //if item is alreay exist in the cart then increment it's quantity
                    if (isset($gift[$id])) {
                        // $gift[$id]['quantity']++;
                        // session()->put('gift', $gift);
                        return redirect()->back()
                            ->with('success', 'Same item can not be added to a gift package');
                    }
                    //if item is not exist in the cart
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
            }
        } else {
            return redirect()->back()
                ->with('warning', 'The quantity you entered has exceeded');
        }
    }
}

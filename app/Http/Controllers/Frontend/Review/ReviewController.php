<?php

namespace App\Http\Controllers\Frontend\Review;

use App\Model\Order;
use App\Model\Review;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order_Product;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store($id, Request $request, Review $review)
    {
        // dd($id);
        $request->validate([
            'review_content' => ['required'],
            'rate' => ['required'],
        ]);

        $userid = Auth::id();
        $product = Product::where('slug', $id)->with('orders')->first();
        $user_orders = Order::where('user_id', $userid)->pluck('id');
        $order_product = Order_Product::whereIn('order_id', $user_orders)
            ->where('product_id', $product->id)
            ->select('order_id')
            ->latest()
            ->first();
        // dd($order_product);
        // $product = Product::where('slug', $id)->with('orders')->latest()->first();
        // $productid = $product->id;
        // $orderid = $product->orders->pluck('id')->last();

        if (Review::where('order_id', $order_product->order_id)->exists()) {
            return redirect()->route('frontend.product.index', $product->slug)
                ->with('warning', 'You have already submitted your order review');
        } elseif ($review = Review::where('product_id', $product->id)->where('user_id', $userid)->first()) {
            // dd($reviewd);
            $review->review_content = $request->review_content;
            $review->rate = $request->rate;
            $review->user_id = $userid;
            $review->order_id = $order_product->order_id;
            $review->product_id = $product->id;
            $review->save();
        } else {
            $review = new Review();
            $review->review_content = $request->review_content;
            $review->rate = $request->rate;
            $review->user_id = $userid;
            $review->order_id = $order_product->order_id;
            $review->product_id = $product->id;
            $review->save();
        }

        return redirect()->route('frontend.product.index', $product->slug)
            ->with('success', 'You have successfully submitted your review');
    }
}

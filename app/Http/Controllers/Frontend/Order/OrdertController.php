<?php

namespace App\Http\Controllers\Frontend\Order;

use App\Model\User;
use App\Model\Order;
use App\Model\Order_Product;
use Illuminate\Http\Request;
use App\Model\BillingAddress;
use App\Model\ShippingAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdertController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userid = Auth::id();
            $orders = Order::where('user_id', $userid)->with('products')->get();
            // $orderid = $orders->pluck('id')->all();
            // $products = Order_Product::all();
            // dd($orders);
            return view('Frontend.Order.index', compact('orders'));
        } else {
            return redirect()->route('frontend.login');
        }
    }

    public function show($id)
    {
        // dd($id);
        $order = Order::where('order_number', $id)->with('products')->first();
        $shipping_details = ShippingAddress::where('id', $order->shipping_id)->first();
        $billing_details = User::where('id', $order->user_id)->with('billing_address')->first();
        // dd($order);
        return view('Frontend.Order.show', compact('order', 'shipping_details', 'billing_details'));
    }
}

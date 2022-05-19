<?php

namespace App\Http\Controllers\Backend\Delivery;

use App\User;
use App\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Delivery;
use App\Model\ShippingAddress;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Delivery Officer')) {
            $deliver_userid = Auth::user()->id;
            $deliveries = Delivery::where('user_id', $deliver_userid)->with('order', 'user')->get();
            // dd($deliveries);
        } else {
            $deliveries = Order::whereIn('status', ['ready_dispatch', 'dispatched', 'on_the_way', 'delivered', 'received'])
                ->with('user', 'delivery')
                ->get();
        }

        return view('Backend.Delivery.index', compact('deliveries'));
    }

    public function show($orderid)
    {
        // dd($orderid);
        $order = Order::where('id', $orderid)->first();
        // dd($delivery);
        $user = ShippingAddress::where('id', $order->shipping_id)->first();
        // dd($user);
        return view('Backend.Delivery.show', compact('order', 'user'));
    }
}

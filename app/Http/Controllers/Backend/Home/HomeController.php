<?php

namespace App\Http\Controllers\Backend\Home;

use App\Model\Order;
use App\Model\Delivery;
use App\Model\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $authuser = Auth::user()->id;
        $driver_orders = Delivery::where('user_id', $authuser)->get();
        $deliveries = Order::where('status', 'ready_dispatch')->get();
        $messages = Complaint::where('status', 'pending')->get();

        if (Auth::user()->hasRole('Delivery Officer')) {
            $driver_orders = Delivery::where('user_id', $authuser)->get();
            // dd($driver_orders);
        } else {
            $deliveries = Order::where('status', 'ready_dispatch')->get();
        }

        $standardOrders = Order::where('type', 'standard')
            ->where('status', 'pending')
            ->get();

        $giftOrders = Order::where('type', 'gift')
            ->where('status', 'pending')
            ->get();
        return view('Backend.Home.index', compact('standardOrders', 'giftOrders', 'deliveries', 'driver_orders', 'messages'));
    }
}

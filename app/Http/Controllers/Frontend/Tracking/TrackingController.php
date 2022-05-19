<?php

namespace App\Http\Controllers\Frontend\Tracking;

use App\Http\Controllers\Controller;
use App\Model\Order;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index($id)
    {
        // dd($id);
        $order = Order::where('order_number', $id)->first();
        // dd($order);
        return view('Frontend.Tracking.index', compact('order'));
    }
}

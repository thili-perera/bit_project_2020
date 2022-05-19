<?php

namespace App\Http\Controllers\Backend\Order;


use App\User;
use App\Model\Role;
use App\Model\Order;
use App\Model\Product;
use App\Model\Delivery;
// use Barryvdh\DomPDF\PDF as PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Model\ShippingAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Mail\MailController;
use App\Model\District;
use Carbon\Carbon;
use Faker\Provider\ar_JO\Address;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();

        // dd($driver);
        return view('Backend.OrderManagement.index', compact('orders'));
    }

    public function standard()
    {
        $orders = Order::where('type', 'standard')->with('user')->get();

        // dd($driver);
        return view('Backend.OrderManagement.standardorders', compact('orders'));
    }

    public function gift()
    {
        $orders = Order::where('type', 'gift')->with('user')->get();

        // dd($driver);
        return view('Backend.OrderManagement.giftorders', compact('orders'));
    }

    public function show($id, Order $order)
    {
        // dd($id);
        $drivers = Role::where('rname', 'Delivery Officer')->with('users')->get();

        $order = Order::where('id', $id)->with('user', 'products')->first();
        $userid = $order->user->id;
        $shipid = $order->shipping_id;
        // dd($order->delivery_id);
        $shipping = ShippingAddress::where('id', $shipid)->with('user', 'district')->first();
        // dd($shipping);
        $user = User::where('id', $userid)->with('billing_address', 'shipping_address')->first();
        // dd($user);
        return view('Backend.OrderManagement.show', compact('order', 'drivers', 'user', 'shipping'));
    }

    public function update($id, Request $request)
    {
        // dd($id);
        $order_delivery = Delivery::where('order_id', $id)->with('user')->first();
        // dd($order_delivery->user->id);
        $order = Order::where('id', $id)->with('products', 'user')->first();
        // dd($order->products);

        $ship_details = ShippingAddress::where('id', $order->shipping_id)->first();
        // dd($ship_details);

        if ($request->status == 'ready_dispatch') {
            if ($order_delivery) {
                $order->status = $request->status;
                $order->delivery_id = $order_delivery->id;
            } else {
                Alert::warning('Please assign a driver first');
                return redirect()->back();
            }
        } else {
            $order->status = $request->status;
        }

        if ($request->status == 'cancelled') {

            foreach ($order->products as $item) {

                Product::where('id', $item->id)->increment('quantity', $item->pivot->quantity);
            }
        }

        $order->save();

        if ($order->status == 'confirmed') {
            Mail::send(
                'Mail.orderconfirm',
                array(
                    'order_number' => $order->order_number,
                    'status' => $order->status,
                    'fname' => $order->user->fname,
                ),
                function ($message) use ($order) {
                    $message->from('amanthicopypaste72@gmail.com');
                    $message->to($order->user->email);
                    $message->subject('Order Confirm');
                }
            );
        } elseif ($order->status == 'dispatched') {
            Mail::send(
                'Mail.shippingconfirm',
                array(
                    'order_number' => $order->order_number,
                    'status' => $order->status,
                    'fname' => $order->user->fname,
                    'products' => $order->products,
                    'grand_total' => $order->grand_total,
                    'receiver_fname' => $ship_details->shipping_fname,
                    'receiver_lname' => $ship_details->shipping_lname,
                    'receiver_address1' => $ship_details->shipping_address1,
                    'receiver_address2' => $ship_details->shipping_address2,
                    'receiver_city' => $ship_details->shipping_city,
                    'receiver_mobile' => $ship_details->shipping_phone,
                    'deliver_person' => $order_delivery->user->fname,
                ),
                function ($message) use ($order) {
                    $message->from('amanthicopypaste72@gmail.com');
                    $message->to($order->user->email);
                    $message->subject('Order Dispatched');
                }
            );
        } elseif ($order->status == 'delivered') {
            Mail::send(
                'Mail.shipcomplete',
                array(
                    'order_number' => $order->order_number,
                    'fname' => $order->user->fname,
                ),
                function ($message) use ($order) {
                    $message->from('amanthicopypaste72@gmail.com');
                    $message->to($order->user->email);
                    $message->subject('Order Dispatched');
                }
            );
        }




        if ($request->status == 'cancelled') {
            Alert::warning('Order cancelled');
            return redirect()->back()->with('warning', 'Order cancelled');
        } else {
            Alert::success('Order status updated successfully');
            return redirect()->back()->with('success', 'Order status updated successfully');
        }
    }

    public function invoice($id)
    {
        // dd($id);
        $order = Order::where('id', $id)->with('user', 'products')->first();
        $shipping_details = ShippingAddress::where('id', $order->shipping_id)->first();
        $shipping_cost = District::where('id', $shipping_details->shipping_district_id)->select('delivery_fee')->first();
        $today = Carbon::now()->format('Y-m-d');
        $pdf = PDF::loadView('Backend.OrderManagement.invoice', ['order' => $order, 'shipping_details' => $shipping_details, 'today' => $today, 'shipping_cost' => $shipping_cost]);
        return $pdf->stream('invoice.pdf');
    }

    public function delperson($id, Request $request, Delivery $delivery)
    {
        $order = Order::where('id', $id)->first();
        $orderid = $order->id;

        if (Delivery::where('order_id', $orderid)->exists()) {
            Alert::warning('A delivery person already has been attached');
            return redirect()->back();
        } else {
            $delivery = new Delivery();
            $delivery->order_id = $orderid;
            $delivery->user_id = $request->deliveryperson;
            // dd($delivery->user_id);
            $delivery->save();
        }

        Alert::success('Delivery Person updated successfully');
        return redirect()->back();
    }
}

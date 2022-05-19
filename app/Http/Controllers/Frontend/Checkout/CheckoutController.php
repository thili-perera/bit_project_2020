<?php

namespace App\Http\Controllers\Frontend\Checkout;

use App\Model\Role;
use App\Model\User;
use App\Model\Order;
use App\Model\Product;
use App\Model\District;
use Illuminate\Http\Request;
use App\Model\BillingAddress;
use App\Model\ShippingAddress;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Mail\MailController;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // The user is logged in...
            // session()->forget('gift');
            $districts = District::all();
            return view('Frontend.Checkout.index', compact('districts'));
        } else {
            return redirect()->route('frontend.login')
                ->with('danger', 'Please login First');
        }
    }

    public function giftcheckout()
    {
        if (Auth::check()) {
            // The user is logged in...
            $districts = District::all();
            if (3 == count((array) session('gift'))) {
                return view('Frontend.Checkout.giftcheckout', compact('districts'));
            } else {
                return redirect()->route('frontend.gift.index')
                    ->with('danger', 'Must be 3 items in the gift basket');
            }
        } else {
            return redirect()->route('frontend.login')
                ->with('danger', 'Please login First');
        }
    }

    public function store(Request $request)
    {
        // dd($request);

        // if (Session::get('gift')) {
        //     $request->validate([
        //         'billing_address1' => ['required'],
        //         'billing_address2' => ['required'],
        //         'billing_city' => ['required'],
        //         'billing_zipcode' => ['required'],
        //         'billing_district' => ['required'],
        //         'mobile' => ['required'],
        //         'shipping_fname' => ['required'],
        //         'shipping_lname' => ['required'],
        //         'shipping_address1' => ['required'],
        //         'shipping_address2' => ['required'],
        //         'shipping_city' => ['required'],
        //         'shipping_district' => ['required'],
        //         'shipping_zipcode' => ['required'],
        //         'shipping_phone' => ['required'],
        //         'delivery_date' => ['required'],
        //     ]);
        // } else {

        //     $request->validate([
        //         'billing_address1' => ['required'],
        //         'billing_address2' => ['required'],
        //         'billing_city' => ['required'],
        //         'billing_zipcode' => ['required'],
        //         'billing_district' => ['required'],
        //         'mobile' => ['required'],
        //         'shipping_fname' => ['required'],
        //         'shipping_lname' => ['required'],
        //         'shipping_address1' => ['required'],
        //         'shipping_address2' => ['required'],
        //         'shipping_city' => ['required'],
        //         'shipping_district' => ['required'],
        //         'shipping_zipcode' => ['required'],
        //         'shipping_phone' => ['required'],
        //     ]);
        // }

        $userid = Auth::id();

        if ($request->input('calship')) {

            if (ShippingAddress::where('shipping_fname', $request->shipping_fname)->exists()) {
                $shipping = ShippingAddress::where('shipping_fname', $request->shipping_fname)->first();
                $shipping->shipping_fname = $request->shipping_fname;
                $shipping->shipping_lname = $request->shipping_lname;
                $shipping->shipping_address1 = $request->shipping_address1;
                $shipping->shipping_address2 = $request->shipping_address2;
                $shipping->shipping_city = $request->shipping_city;
                $shipping->shipping_district_id = $request->shipping_district;
                $shipping->shipping_zipcode = $request->shipping_zipcode;
                $shipping->shipping_phone = $request->shipping_phone;
                $shipping->user()->associate($userid)->save();
            } else {
                $shipping = new ShippingAddress();
                $shipping->shipping_fname = $request->shipping_fname;
                $shipping->shipping_lname = $request->shipping_lname;
                $shipping->shipping_address1 = $request->shipping_address1;
                $shipping->shipping_address2 = $request->shipping_address2;
                $shipping->shipping_city = $request->shipping_city;
                $shipping->shipping_district_id = $request->shipping_district;
                $shipping->shipping_zipcode = $request->shipping_zipcode;
                $shipping->shipping_phone = $request->shipping_phone;
                $shipping->user()->associate($userid)->save();
            }

            if ($billing = BillingAddress::where('user_id', $userid)->exists()) {

                $billing = BillingAddress::where('user_id', $userid)->first();
                // $selectedDistrict = $billing->billing_district;

                $billing->address_line_1 = $request->billing_address1;
                $billing->address_line_2 = $request->billing_address2;
                $billing->city = $request->billing_city;
                $billing->district = $request->billing_district;
                $billing->zipCode = $request->billing_zipcode;
                $billing->user()->mobile = $request->billing_phone;
                $billing->user()->associate($userid)->save();
            } else {
                $billing = new BillingAddress;
                $billing->address_line_1 = $request->billing_address1;
                $billing->address_line_2 = $request->billing_address2;
                $billing->city = $request->billing_city;
                $billing->district = $request->billing_district;
                $billing->zipCode = $request->billing_zipcode;
                $billing->user()->mobile = $request->billing_phone;
                $billing->user()->associate($userid)->save();
            }

            $user = User::find($userid);
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->mobile = $request->mobile;
            $user->save();
            // dd($shipping);

            $districts = District::all();
            $quantity = $request->item_count;

            // dd($request);

            if ($request->cart) {
                return view('Frontend.checkout.index', compact('shipping', 'billing', 'user', 'districts'));
            } elseif ($request->gift) {
                $delivery_date = $request->delivery_date;
                $notes = $request->notes;
                $startTime = Carbon::now();
                $endTime = Carbon::parse($delivery_date);
                $totalDuration = $endTime->diffInDays($startTime);
                if ($totalDuration >= 2 and $delivery_date > $startTime) {
                    return view('Frontend.checkout.giftcheckout', compact('shipping', 'billing', 'user', 'districts', 'delivery_date', 'notes'));
                } else {
                    return redirect()->back()
                        ->with('danger', 'Gift must be ordered atleast 3 days before the delivery date');
                }
            }
            if ($request->buy) {
                // dd('ok');
                $product = Product::where('id', $request->buy_product)->first();
                return view('Frontend.checkout.buy2', compact('shipping', 'billing', 'user', 'districts', 'product', 'quantity'));
            }
        }


        if ($request->input('placeorder')) {
            // dd($request);

            $shipid = $request->shipid; //get last saved value id
            $userid = Auth::id();

            $deliverydate = $request->delivery_date;
            $startTime = Carbon::now();
            // dd($startTime);
            $endTime = Carbon::parse($deliverydate);
            $totalDuration = $endTime->diffInDays($startTime);
            // dd($totalDuration);
            $ship_details = ShippingAddress::where('id', $shipid)->select('shipping_district_id')->first();
            $delivery_fee = District::where('id', $ship_details->shipping_district_id)->select('delivery_fee')->first();

            $order = new Order();
            if ($request->gift) { //check order is gift or not
                $order->type = 'gift';
            } else {
                $order->type = 'standard';
            }
            $order->order_number = uniqid('SN-');
            $order->grand_total = $request->grand_total;
            $order->item_count = $request->item_count;
            $order->user_id = $userid;
            $order->shipping_id = $shipid;
            $order->delivery_date = $request->delivery_date;
            $order->payment_method = $request->payment_method;
            $order->delivery_fee = $delivery_fee->delivery_fee;
            $order->notes = $request->notes;
            $order->sender_details = $request->sender;
            $order->save();

            $admins = Role::where('rname', 'Admin')->with('users')->first();

            if ($request->cart) {
                if (Session::get('cart')) {
                    $cartItems = Session::get('cart');
                    foreach ($cartItems as $item) {
                        Product::where('id', $item['id'])->decrement('quantity', $item['quantity']);
                        $order->products()->attach($item['id'], ['price' => $item['salesprice'], 'quantity' => $item['quantity']]);

                        $products_quantity_2 = Product::where('id', $item['id'])->where('quantity', 2)->get();
                        // dd($products_quantity_2);

                        foreach ($products_quantity_2 as $item) {
                            $quantity_2 = $item->quantity;

                            if ($quantity_2 = 2) {
                                foreach ($admins->users as $admin) {
                                    Mail::send(
                                        'Mail.stock',
                                        array(
                                            'products' => $products_quantity_2,
                                        ),
                                        function ($message) use ($admin) {
                                            $message->from('amanthicopypaste72@gmail.com');
                                            $message->to($admin->email);
                                            $message->subject('Update the store');
                                        }
                                    );
                                }
                            }
                        }
                    }
                }
                session()->forget('cart');
            } elseif ($request->buy) {
                //when click buy button
                $id = $request->buy_product;
                $item = Product::find($id);
                // dd($item);
                Product::where('id', $item->id)->decrement('quantity', $request->item_count);
                $order->products()->attach($item->id, ['price' => $item->salesprice, 'quantity' => $request->item_count]);

                $products_quantity_2 = Product::where('id', $item->id)->where('quantity', 2)->get();
                foreach ($products_quantity_2 as $item) {
                    $quantity_2 = $item->quantity;

                    $admins = Role::where('rname', 'Admin')->with('users')->first();

                    if ($quantity_2 = 2) {
                        foreach ($admins->users as $admin) {
                            Mail::send(
                                'Mail.stock',
                                array(
                                    'products' => $products_quantity_2,
                                ),
                                function ($message) use ($admin) {
                                    $message->from('amanthicopypaste72@gmail.com');
                                    $message->to($admin->email);
                                    $message->subject('Update the store');
                                }
                            );
                        }
                    }
                }
            } elseif ($request->gift) {
                if (Session::get('gift')) {
                    $giftItems = Session::get('gift');
                    $admins = Role::where('rname', 'Admin')->with('users')->first();

                    foreach ($giftItems as $item) {
                        Product::where('id', $item['id'])->decrement('quantity', $item['quantity']);
                        $order->products()->attach($item['id'], ['price' => $item['salesprice'], 'quantity' => $item['quantity']]);

                        $products_quantity_2 = Product::where('id', $item['id'])->where('quantity', 2)->get();

                        foreach ($products_quantity_2 as $item) {
                            $quantity_2 = $item->quantity;
                            if ($quantity_2 = 2) {
                                foreach ($admins->users as $admin) {
                                    Mail::send(
                                        'Mail.stock',
                                        array(
                                            'products' => $products_quantity_2,
                                        ),
                                        function ($message) use ($admin) {
                                            $message->from('amanthicopypaste72@gmail.com');
                                            $message->to($admin->email);
                                            $message->subject('Update the store');
                                        }
                                    );
                                }
                            }
                        }
                    }
                }
                session()->forget('gift');
            }
            $ship_details = ShippingAddress::where('id', $order->shipping_id)->first();

            if ($order->type == 'standard') {
                Mail::send(
                    'Mail.placeorder',
                    array(
                        'order_number' => $order->order_number,
                        'status' => $order->status,
                        'fname' => $order->user->fname,
                        'lname' => $order->user->lname,
                        'products' => $order->products,
                        'grand_total' => $order->grand_total,
                        'shipping_cost' => $order->delivery_fee,
                        'order_type' => $order->type,
                        'delivery_date' => $order->delivery_date,
                        'sender_details' => $order->sender_details,
                        'sender_address_line_1' => $order->user->billing_address->address_line_1,
                        'sender_address_line_2' => $order->user->billing_address->address_line_2,
                        'sender_zipCode' => $order->user->billing_address->zipCode,
                        'sender_mobile' => $order->user->mobile,
                        'receiver_fname' => $ship_details->shipping_fname,
                        'receiver_lname' => $ship_details->shipping_lname,
                        'receiver_address1' => $ship_details->shipping_address1,
                        'receiver_address2' => $ship_details->shipping_address2,
                        'receiver_city' => $ship_details->shipping_city,
                        'receiver_mobile' => $ship_details->shipping_phone,
                    ),
                    function ($message) use ($order) {
                        $message->from('amanthicopypaste72@gmail.com');
                        $message->to($order->user->email);
                        $message->subject('Successfully Ordered');
                    }
                );
            } elseif ($order->type == 'gift') {
                Mail::send(
                    'Mail.placeorder',
                    array(
                        'order_number' => $order->order_number,
                        'status' => $order->status,
                        'fname' => $order->user->fname,
                        'lname' => $order->user->lname,
                        'products' => $order->products,
                        'grand_total' => $order->grand_total,
                        'shipping_cost' => $order->delivery_fee,
                        'order_type' => $order->type,
                        'delivery_date' => $order->delivery_date,
                        'sender_details' => $order->sender_details,
                        'sender_address_line_1' => $order->user->billing_address->address_line_1,
                        'sender_address_line_2' => $order->user->billing_address->address_line_2,
                        'sender_zipCode' => $order->user->billing_address->zipCode,
                        'sender_mobile' => $order->user->mobile,
                        'receiver_fname' => $ship_details->shipping_fname,
                        'receiver_lname' => $ship_details->shipping_lname,
                        'receiver_address1' => $ship_details->shipping_address1,
                        'receiver_address2' => $ship_details->shipping_address2,
                        'receiver_city' => $ship_details->shipping_city,
                        'receiver_mobile' => $ship_details->shipping_phone,

                    ),
                    function ($message) use ($order) {
                        $message->from('amanthicopypaste72@gmail.com');
                        $message->to($order->user->email);
                        $message->subject('Successfully Ordered');
                    }
                );
            }


            $order_number = $order->order_number;
            return view('Frontend.checkout.completeorder', compact('order_number'));
        }
    }
}

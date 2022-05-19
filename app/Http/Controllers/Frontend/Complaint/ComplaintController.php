<?php

namespace App\Http\Controllers\Frontend\Complaint;

use App\Model\Order;
use App\Model\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index($id)
    {
        $order = Order::where('order_number', $id)->with('products')->first();
        // dd($order);
        return view('Frontend.Complaint.index', compact('order'));
    }

    public function store(Request $request, Complaint $complaint, $id)
    {
        $orderid = Order::where('order_number', $id)->select('id')->first();

        if (Complaint::where('order_id', $orderid->id)->exists()) {
            return redirect()->back()
                ->with('warning', 'You have already submitted a complaint to us. Please wait until our agent checks your complaint.');
        } else {
            $complaint = new Complaint();
            $complaint->user_id = Auth::user()->id;
            $complaint->order_id = $orderid->id;
            $complaint->subject = $request->subject;
            $complaint->message = $request->message;
            $complaint->save();
        }

        return redirect()->back()
            ->with('success', 'successfully submitted your message');
    }
}

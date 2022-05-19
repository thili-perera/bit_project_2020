<?php

namespace App\Http\Controllers\Backend\Complaint;

use App\Model\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with('user', 'order')->get();
        // dd($complaints);
        return view('Backend.Complaint.index', compact('complaints'));
    }

    public function pending()
    {
        $complaints = Complaint::where('status', 'pending')->with('user', 'order')->get();
        // dd($complaints);
        return view('Backend.Complaint.index', compact('complaints'));
    }

    public function reviewing()
    {
        $complaints = Complaint::where('status', 'reviewing')->with('user', 'order')->get();
        // dd($complaints);;
        return view('Backend.Complaint.index', compact('complaints'));
    }

    public function show($id)
    {
        $complaint = Complaint::where('id', $id)->with('user', 'order')->first();
        // dd($complaints);
        return view('Backend.Complaint.show', compact('complaint'));
    }

    public function update($id, Request $request, Complaint $complaint)
    {
        // dd($id);
        $complaint = Complaint::where('id', $id)->with('user', 'order')->first();
        // dd($complaint);
        $complaint->status = $request->complaint_status;
        $complaint->save();

        if ($complaint->status == 'reviewing') {
            Mail::send(
                'Mail.complaintreview',
                array(
                    'order_number' => $complaint->order->order_number,
                    'fname' => $complaint->user->fname,
                ),
                function ($message) use ($complaint) {
                    $message->from('amanthicopypaste72@gmail.com');
                    $message->to($complaint->user->email);
                    $message->subject('Service Rewieving');
                }
            );
        } elseif ($complaint->status == 'completed') {
            Mail::send(
                'Mail.servicecompleted',
                array(
                    'order_number' => $complaint->order->order_number,
                    'fname' => $complaint->user->fname,
                ),
                function ($message) use ($complaint) {
                    $message->from('amanthicopypaste72@gmail.com');
                    $message->to($complaint->user->email);
                    $message->subject('Service Completed');
                }
            );
        }

        Alert::success('Service status updated successfully');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Backend\Report;

use Carbon\Carbon;
use App\Model\Role;
use App\Model\User;
use App\Model\Order;
use App\Model\Product;
use App\Model\Category;
use App\Model\Delivery;
use App\Model\Supplier;
use App\Model\Inventory;
use App\Model\Role_User;
use App\Model\Order_Product;
use Illuminate\Http\Request;
use App\Model\Category_Product;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function stock(Request $request)
    {
        $stocks = Inventory::with('product', 'supplier')->get();
        // dd($request);
        $suppliers = Supplier::all();
        return view('Backend.Report.stock', compact('stocks', 'suppliers'));
    }

    public function stockFilter(Request $request)
    {
        // dd($request);
        $request->validate([
            'supplier' => 'required',
        ]);

        $stocks = Inventory::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->where('supplier_id', $request->supplier)
            ->get();
        // dd($stocks);
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $supplierd = Supplier::where('id', $request->supplier)->select('name')->first();
        // dd($startdate);
        $suppliers = Supplier::all();
        if ($request->input('filter')) {
            return view('Backend.Report.stock', compact('stocks', 'supplierd', 'suppliers', 'enddate', 'startdate', 'supplierd'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.stock', ['data' => $stocks, 'supplier' => $supplierd, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('stock_report.pdf');
        }
    }

    public function order()
    {
        $orders = Order::all();
        return view('Backend.Report.order', compact('orders'));
    }

    public function orderFilter(Request $request)
    {
        $orders = Order::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->whereIn('status', ['delivered', 'received'])
            ->where('payment_method', 'card')
            ->get();
        // dd($orders);
        if ($request->input('filter')) {
            // dd('filter');
            return view('Backend.Report.order', compact('orders'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.order', ['data' => $orders]);
            return $pdf->stream('order_report.pdf');
        }
    }

    public function income()
    {
        // $orders = Order::whereDate('created_at', Carbon::now()->subDays(7))->get();
        // dd($orders);
        $orders = Order::whereIn('status', ['delivered', 'received'])
            ->whereIn('payment_method', ['card', 'cash_on_delivery'])
            ->get();
        return view('Backend.Report.income', compact('orders'));
    }

    public function incomeFilter(Request $request)
    {

        $orders = Order::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->get();
        if ($request->input('filter')) {
            // dd('filter');
            return view('Backend.Report.income', compact('orders'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.income', ['data' => $orders]);
            return $pdf->stream('order_income_report.pdf');
        }
    }
    public function user()
    {
        $roleids = Role_User::whereIn('role_id', ['1', '2', '5'])->pluck('user_id');
        // dd($roleids);
        $users = User::whereIn('id', $roleids)->with('roles')->get();
        // dd($users);

        return view('Backend.Report.user', compact('users'));
    }

    public function userFilter(Request $request)
    {
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $roleids = Role_User::whereIn('role_id', ['1', '2', '5'])->pluck('user_id');
        $users = User::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->whereIn('id', $roleids)
            ->get();
        // dd($users);
        if ($request->input('filter')) {
            // dd($request);
            return view('Backend.Report.user', compact('users', 'startdate', 'enddate'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.user', ['data' => $users, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('user_report.pdf');
        }
    }

    public function customer()
    {
        $customerids = Role_User::where('role_id', '5')->pluck('user_id');
        // dd($customerids)
        $customers = User::whereIn('id', $customerids)->get();
        // dd($customers);
        return view('Backend.Report.customer', compact('customers'));
    }

    public function customerFilter(Request $request)
    {
        // dd($request);
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $customerids = Role_User::where('role_id', '3')->pluck('user_id');
        $customers = User::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->whereIn('id', $customerids)
            ->get();
        if ($request->input('filter')) {
            // dd('filter');
            return view('Backend.Report.customer', compact('customers', 'startdate', 'enddate'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.customer', ['data' => $customers, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('customer_report.pdf');
        }
    }

    public function supplier()
    {
        $suppliers = Supplier::all();
        // dd($suppliers);
        return view('Backend.Report.supplier', compact('suppliers'));
    }

    public function supplierFilter(Request $request)
    {
        // dd($request);
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $suppliers = Supplier::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->get();
        if ($request->input('filter')) {
            // dd('filter');
            return view('Backend.Report.supplier', compact('suppliers', 'startdate', 'enddate'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.supplier', ['data' => $suppliers, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('supplier_report.pdf');
        }
    }

    public function product()
    {
        $products = Product::with('categories')->get();
        $categories = Category::where('parent_id', 0)->get();
        // dd($products);
        return view('Backend.Report.product', compact('products', 'categories'));
    }

    public function productFilter(Request $request)
    {
        $request->validate([
            'catid' => 'required',
        ]);
        // dd($request);
        $selectedcategory = $request->catid;
        // dd($selectedcategory);
        $categories = Category::where('parent_id', 0)->get();
        $startdate = $request->startdate;
        $enddate = $request->enddate;

        $productids = Category_Product::where('category_id', $selectedcategory)->pluck('product_id');
        // dd($productids);
        $products = Product::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->whereIn('id', $productids)
            ->with('categories')
            ->get();
        // dd($products);
        if ($request->input('filter')) {
            // dd($request);
            return view('Backend.Report.product', compact('products', 'startdate', 'enddate', 'categories', 'selectedcategory'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.product', ['data' => $products, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('product_report.pdf');
        }
    }

    public function saledproduct()
    {
        $saled_products = Order::with('products')->get();
        return view('Backend.Report.saledproduct', compact('saled_products'));
    }

    public function saledproductFilter(Request $request)
    {
        // dd($request);
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $saled_products = Order::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->with('products')
            ->get();
        // dd($saled_products);
        if ($request->input('filter')) {
            // dd('filter');
            return view('Backend.Report.saledproduct', compact('saled_products', 'startdate', 'enddate'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.saledproduct', ['data' => $saled_products, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('saledproduct_report.pdf');
        }
    }

    public function delivery()
    {
        $deliveries = Delivery::with('order', 'user')->get();
        return view('Backend.Report.delivery', compact('deliveries'));
    }

    public function deliveryFilter(Request $request)
    {
        // dd($request);
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $deliveries = Delivery::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->with('order', 'user')
            ->get();
        // dd($deliveries);
        if ($request->input('filter')) {
            // dd('filter');
            return view('Backend.Report.delivery', compact('deliveries', 'startdate', 'enddate'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.delivery', ['data' => $deliveries, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('delivery_report.pdf');
        }
    }

    public function payment()
    {
        $payments = Order::all();
        return view('Backend.Report.payment', compact('payments'));
    }

    public function paymentFilter(Request $request)
    {
        // dd($request);
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $payments = Order::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->get();
        // dd($deliveries);
        if ($request->input('filter')) {
            // dd('filter');
            return view('Backend.Report.payment', compact('payments', 'startdate', 'enddate'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.payment', ['data' => $payments, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('payment_report.pdf');
        }
    }

    public function tracking()
    {
        $trackings = Order::all();
        return view('Backend.Report.tracking', compact('trackings'));
    }

    public function trackingFilter(Request $request)
    {
        // dd($request);
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $trackings = Order::where('created_at', '>=', $request->startdate)
            ->where('created_at', '<=', $request->enddate)
            ->get();
        if ($request->input('filter')) {
            return view('Backend.Report.tracking', compact('trackings', 'startdate', 'enddate'));
        }

        if ($request->input('report')) {
            $pdf = PDF::loadView('Backend.Report.PDF.tracking', ['data' => $trackings, 'enddate' => $enddate, 'startdate' => $startdate]);
            return $pdf->stream('tracking_report.pdf');
        }
    }
}

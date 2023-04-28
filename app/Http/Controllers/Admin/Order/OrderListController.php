<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class OrderListController extends Controller
{

    public function index()
    {
        $art = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id')
            ->select('orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address')
            ->groupBy('orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address')
            ->get();
        $detail = Order::where('payment_status', '0')->get();
        $username = Order::with('login')->get();
        $total = Order::where('userId', Auth::id())->get()->sum('price');
        $count = Order::where('userId', Auth::id())->get()->count();
        return view('admin.Order.index', compact('detail', 'art', 'username', 'total', 'count'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'payment_status' => 'required|in:0,1',
        ]);

        // save the data to the database
        $orderList = new Order;
        $orderList->payment_status = $validatedData['payment_status'];
        $orderList->save();
        return response()->json(['success' => true]);
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        //


    }


    public function update(Request $request, $id)
    {
        //
        $order = Order::find($id);
        $order->payment_status = $request->input('payment_status');
        $order->save();
        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        //
    }
    public function ViewVerifyOrderDetail($orderCode)
    {
        $userDetail = Order::join('users', 'orders.userId', '=', 'users.id')
            ->select('users.*')
            ->where('orders.OrderCode', $orderCode)
            ->first();
            $orderDetail = Order::join('products', 'products.Id', '=', 'orders.productId')
            ->select('products.*', 'orders.*')
            ->where('orders.OrderCode', $orderCode)
            ->get();
        $order = Order::where('orders.OrderCode', $orderCode)->first();
        $total = Order::where('orders.OrderCode', $orderCode)->get()->sum('price');
        return view('admin.Order.verify', compact('userDetail', 'orderDetail', 'total', 'order'));
    }
    public function VerifyOrderDetail(Request $request)
    {
        if ($request->get('Status') == "Approve Pending") {

            Order::where('OrderCode',  $request->get('OrderCode'))->update([
                'VerifiedRemarks' => $request->get('Remarks'),
                'payment_status' => $request->get('Status')
                // 'payment_status' => $request->get('Status')
            ]);
        } else {
            Order::where('OrderCode',  $request->get('OrderCode'))->update([
                'RejectedRemarks' => $request->get('Remarks'),
                'payment_status' => $request->get('Status')
            ]);
        }
        return redirect()->route('OrderList.index');
    }
    public function ViewApprveOrderDetail($orderCode)
    {
        $userDetail = Order::join('users', 'orders.userId', '=', 'users.id')
            ->select('users.*')
            ->where('orders.OrderCode', $orderCode)
            ->first();
            $orderDetail = Order::join('products', 'products.Id', '=', 'orders.productId')
            ->select('products.*', 'orders.*')
            ->where('orders.OrderCode', $orderCode)
            ->get();
        $order = Order::where('orders.OrderCode', $orderCode)->first();
        $total = Order::where('orders.OrderCode', $orderCode)->get()->sum('price');
        return view('admin.Order.approve', compact('userDetail', 'orderDetail', 'total', 'order'));
    }
    public function ApproveOrderDetail(Request $request)
    {
        if ($request->get('Status') == "Approved") {

            Order::where('OrderCode', $request->get('OrderCode'))->update([
                'ApproveRemarks' => $request->get('Remarks'),
                'payment_status' => $request->get('Status')
            ]);
        } else {
            Order::where('OrderCode',  $request->get('OrderCode'))->update([
                'RejectedRemarks' => $request->get('Remarks'),
                'payment_status' => $request->get('Status')
            ]);
        }
        return redirect()->route('OrderList.index');
        return view('admin.Order.verify');
    }
    public function ViewOrderDetail($orderCode)
    {
        $orderDetail = Order::join('products', 'products.id', '=', 'orders.productId')
            ->select('products.id','products.image','products.name', 'products.price','orders.*')
            ->where('orders.OrderCode', $orderCode)
            ->get();
        $order = Order::where('orders.OrderCode', $orderCode)->first();
        $total = Order::where('orders.OrderCode', $orderCode)->get()->sum('price');

        return view('admin.Order.view', compact('orderDetail', 'total', 'order'));
    }
}

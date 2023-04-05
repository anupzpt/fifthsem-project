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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $order = Order::find($id);
        $order->payment_status = $request->input('payment_status');
        $order->save();
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $orderDetail = Order::where('orders.OrderCode', $orderCode)->get();
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
        $orderDetail = Order::where('orders.OrderCode', $orderCode)->get();
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
        // $art = DB::table('orders')
        // ->join('products', 'products.id', '=', 'orders.productId')
        // ->select('products.id','products.image','products.name', 'products.price')
        // ->groupBy('orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address')
        // ->get();
        $orderDetail = Order::join('products', 'products.id', '=', 'orders.productId')
            ->select('products.id','products.image','products.name', 'products.price','orders.*')
            ->where('orders.OrderCode', $orderCode)
            ->get();
        $order = Order::where('orders.OrderCode', $orderCode)->first();
        $total = Order::where('orders.OrderCode', $orderCode)->get()->sum('price');
        return view('admin.Order.view', compact('orderDetail', 'total', 'order'));
    }
}

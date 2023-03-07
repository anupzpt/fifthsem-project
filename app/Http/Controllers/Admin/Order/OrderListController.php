<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\Order\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $order = Order::get();
        $detail = Order::where('payment_status', '0')->get();
        // dd($detail);
        $art = Order::with('products')->get();
        $username = Order::with('login')->get();
        // dd($art);
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
    
        // return a response
        return response()->json(['success' => true]);
        // $paymentStatus = $request->input('payment_status');

        // // // Perform database insertion here
        // $orderList = new Order();
        // $orderList->payment_status = $paymentStatus;
        // $orderList->save();

        // return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $orders= Order::where('id',$id)->get();
        // return view('admin.Order.index',compact('orders'));
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
    // public function change_paymentStatus(Request $request){
    //     $id =$request->id;
    //     $payment_status= $request->payment_status;
    //     $status = Order::where('id',$id)->update(['
    //     payment_status' => $payment_status]);
    // }
}

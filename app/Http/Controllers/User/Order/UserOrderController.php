<?php

namespace App\Http\Controllers\User\Order;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\AddToCart\AddToCart;
use App\Models\User\Order\Order;
use App\Models\User\UserAddress\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail = AddToCart::where('userId', Auth::id())->get();
        $art = AddToCart::with('products')->get();
        $total = AddToCart::where('userId', Auth::id())->get()->sum('price');
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        $userAddress = Address::where('userId', Auth::id())->get();
        return view('user.order.index', compact('count', 'detail', 'art','total', 'userAddress'));
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
        Address::Create($request->all());
        return response()->json([
            'status' => 'success',
            'Address' => $request->get('Address'),
            'City' => $request->get('city'),
            'ZipCode' => $request->get('zip_code'),
            'code' => 0,
        ]);
    }
    public function orderStore(Request $request)
    {

        $detail = $request->all();
        for ($i = 0; $i < count($request->get('userId')); $i++) {
            $order = new Order();
            $order->productId = $detail['productId'][$i];
            $order->quantity = $detail['quantity'][$i];
            $order->price = $detail['price'][$i];
            $order->address = $detail['address'][$i];
            $order->userId = $detail['userId'][$i];
            $order->payment_status = "0";
            $order->save();
        }
        // dd($order);
        $cartItems = AddToCart::where('userId', Auth::id())->get();
       AddToCart::destroy($cartItems);
        return redirect('/')->with('status',"Order placed successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = null;
        $orderDetail=Product::where('id',$id)->get();
        // dd($orderDetail);
        $totalarray = Product::where('id', Auth::id())->get('price');
        $total=$totalarray[0]->price;
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        $userAddress = Address::where('userId', Auth::id())->get();
        return view('user.order.index', compact('count', 'detail', 'total', 'userAddress','orderDetail'));
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
}

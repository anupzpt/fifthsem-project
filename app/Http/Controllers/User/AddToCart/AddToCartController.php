<?php

namespace App\Http\Controllers\User\AddToCart;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\User\AddToCart\AddToCart;
use App\Models\User\Order\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('products')
            ->join('add_to_carts', 'add_to_carts.productId', '=', 'products.id')
            ->select('products.name')
            ->where('add_to_carts.userId', Auth::id())
            ->where('products.productStatus', 'sold')
            ->get();
        if (count($orders) >= 1) {
            return response()->json([
                'status' => 'success',
                'message' => $orders[0]->name,
                'code' => count($orders),
            ]);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => "",
                'code' => count($orders),
            ]);
        }
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
        $cartItems = AddToCart::where('userId', Auth::id())->get();
        $cartItemIds = $cartItems->pluck('id')->toArray();
        $data = array();
        foreach ($cartItemIds as $i => $value) {
            $cart = AddToCart::find($value);
            $data[$i]['userId'] = $cart->userId;
            $data[$i]['productId'] = $cart->productId;
            $data[$i]['quantity'] = $cart->quantity;
            $data[$i]['price'] = $cart->price;
            $data[$i]['payment_status'] = '0';
        }
        $ProductBooking = Order::insert($data);
        if ($ProductBooking) {
            AddToCart::destroy($cartItemIds);
        }
        return redirect('/')->with('status', "Order placed successfully");
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
    }
    public function delete(Request $request)
    {
        // $cart=AddToCart::find($request->get('id'));

        $cartId = $request->input('productId');
        $cart = AddToCart::where('productId', $cartId)
                        ->where('userId',Auth::id());
        $cart->delete();
        return response()->json(['status' =>  "Deleted"]);
    }

}

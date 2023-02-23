<?php

namespace App\Http\Controllers\User\AddToCart;

use App\Http\Controllers\Controller;
use App\Models\User\AddToCart\AddToCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //



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
        // dd($request->all());
        // $order =new Order();
        // $order->save($request->all())
        $count = AddToCart::where('userId', Auth::id())->get()->count();

        return view('user.order.index',compact('count'));

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

        $cartId=$request->input('productId');
        $cart=AddToCart::where('productId',$cartId);
        $cart->delete();
        return response()->json(['message' =>  "Are you sure you want to delete product?"]);
    }

}

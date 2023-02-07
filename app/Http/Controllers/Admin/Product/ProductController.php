<?php

namespace App\Http\Controllers\Admin\Product;
use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Category\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $response = Product::all();
        // return view('admin.Product.index',compact('response'));
        return view('admin.Product.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $response = Category::whereNotNull('parent_id');
        $response = Category::get()->whereNotNull('parent_id');
        // dd($response);
        return view('admin.Product.create',compact('response'));
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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
       $product = new Product;
       $product->name =$request->name;
       $product->category_id =$request->category_id;
       $product->description =$request->description;
       $product->price =$request->price;

        if($request->hasFile('image'))
        {
            $image =$request->file('image');
            $photo = $image->store('images','public');
            $product->image=$request->image;
        }
        $product->save();
        // return redirect()->action("index","Product")->with('status','Product Added Successfully');
        return redirect()->action([ProductController::class, 'index'])->with('status','Product Added Successfully');
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
        //
    }
}

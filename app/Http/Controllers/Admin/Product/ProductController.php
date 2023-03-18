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
        $response = Product::join('categories', 'categories.categoryId', '=', 'products.category_id')
            ->select('products.id','products.name', 'products.price', 'products.image', 'categories.name as Categoryname')
            ->get();
        return view('admin.Product.index', compact('response'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Category::get()->whereNotNull('parent_id');
        return view('admin.Product.create', compact('response'));
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
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $product->image = $fileName;
        }
        $product->save();
        // return redirect()->action("index","Product")->with('status','Product Added Successfully');
        return redirect()->action([ProductController::class, 'index'])->with('status', 'Product Added Successfully');
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
        $product = Product::find($id);
        $response = Category::get()->whereNotNull('parent_id');
        return view('admin.Product.edit', compact('product', 'response'));
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
        $productDetails = Product::find($id);
        $response=$request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("/uploads"), $fileName);
            $response["image"] = $fileName;
        }
        $productDetails->update($response);
        return redirect()->route('Product.index')->with('message', 'Product Updated Successfully');
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
        $product= Product::find($id);
        $product->delete();
        return redirect()->action([ProductController::class, 'index'])->with('status', 'Product Deleted Successfully');

        // return redirect()->route('Product.index');
    }
}

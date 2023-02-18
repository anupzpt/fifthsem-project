<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\login\User;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        $products = Product::take(3)->get();
        $latestPosts = Product::limit(3)->latest('created_at')->get();
        return view('user.dashboard.dashboard',compact('products','latestPosts') );
    }
    public function Art(){
        $child = Category::whereNotNull('parent_id')->get();
        $parent = Category::whereNull('parent_id')->get();
        // dd($parent,$child);
        $products = Product::all();
        return view('user.art.art',compact('products','child','parent'));
    }

    public function Cart(Request $request){
        return response()->json([
            'status' => 'success',
            'message' => $request->get('id'),
        ]);
    }
    // public function Parent($id){
    //     $product = Category::where('parent_id', $id)->get();
    //     dd($product);
    //     return view("user.art.art",compact("product"));
    // }

    // public function show($id){
    //     $product=Product::where('porduct'==$id)->get();
    //     return view("",comapct("product"));
    // }
}

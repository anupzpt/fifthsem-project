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
        return view('user.dashboard.dashboard', compact('products', 'latestPosts'));
    }
    
    public function Art()
    {
        $parent = Category::whereNull('parent_id')->get();
        $child = Category::whereNotNull('parent_id')->get();
        $products = Product::all();
        return view('user.art.art', compact('products', 'child', 'parent'));
    }

    public function Cart(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'message' => $request->get('id'),
        ]);
    }
    public function Parent($id)
    {
        $child = Category::whereNotNull('parent_id')->get();
        $parent = Category::whereNull('parent_id')->get();
        $childCategory = Category::where('parent_id', $id)->get();
        $products = Product::whereIn('category_id', $childCategory->pluck('categoryId'))
            ->get();
        return view('user.art.art_detail', compact('products', 'child', 'parent'));
    }
    public function Child($id)
    {
        $parent = Category::whereNull('parent_id')->get();
        $child = Category::whereNotNull('parent_id')->get();
        $products = Product::where('category_id',$id)->get();
        return view('user.art.art_detail', compact('products','parent','child'));
    }
}

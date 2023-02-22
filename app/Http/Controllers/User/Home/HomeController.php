<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\login\User;
use App\Models\Product\Product;
use App\Models\User\AddToCart\AddToCart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        $products = Product::take(3)->get();
        $latestPosts = Product::limit(3)->latest('created_at')->get();
        $count= AddToCart::where('userId','1')->get()->count();
        return view('user.dashboard.dashboard', compact('products', 'latestPosts','count'));
    }

    public function Art()
    {
        $parent = Category::whereNull('parent_id')->get();
        $child = Category::whereNotNull('parent_id')->get();
        $products = Product::all();
        $count= AddToCart::where('userId','1')->get()->count();
        return view('user.art.art', compact('products', 'child', 'parent','count'));
    }

    public function Cart(Request $request)
    {
        $cart = Product::find($request->get('id'));
        $cartDetail = new AddToCart();
        $cartDetail->productId = $cart->id;
        $cartDetail->userId = 1;
        $cartDetail->quantity = '1';
        $cartDetail->price = $cart->price;
        $cartDetail->save();
        $count= AddToCart::where('userId','1')->get()->count();
        // $demo = AddToCart::where('userId','1')->get()->count();
        return response()->json([
            'status' => 'success',
            // 'message' => $request->get('id'),
            'message' => $cart,
            'code' => 0,
            'count'=>$count,

        ]);
    }
    public function CartIndex() {
        $response = AddToCart::where('userId','1')->get();
        $count= AddToCart::where('userId','1')->get()->count();
        $art = AddToCart::with('products')->get();
        // dd($art);
        return view('user.addtocart.index', compact('response','count','art'));
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
        $products = Product::where('category_id', $id)->get();
        return view('user.art.art_detail', compact('products', 'parent', 'child'));
    }
}

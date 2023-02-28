<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\login\User;
use App\Models\Product\Product;
use App\Models\User\AddToCart\AddToCart;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Index()
    {
        session()->put(['popupBoxValue']);
        $products = Product::take(3)->get();
        $latestPosts = Product::limit(3)->latest('created_at')->get();
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        return view('user.dashboard.dashboard', compact('products', 'latestPosts', 'count'));
    }
    public function myOrder()
    {
        session()->put('popupBoxValue', '2');
        return view('user.profileDetail.user-profile');
    }
    public function myAccount()
    {
        session()->put('popupBoxValue', '1');
        return view('user.profileDetail.user-profile');
    }
    public function returnAndCancel()
    {
        session()->put('popupBoxValue', '3');
        return view('user.profileDetail.user-profile');
    }

    public function Art()
    {
        $parent = Category::whereNull('parent_id')->get();
        $child = Category::whereNotNull('parent_id')->get();
        $products = Product::all();
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        return view('user.art.art', compact('products', 'child', 'parent', 'count'));
    }

    public function Cart(Request $request)
    {

        if(Auth::id() == null){
            return response()->json([
                'message' => Auth::check(),
                'code' => 101,
            ]);
         }
         else{
            $cart = Product::find($request->get('id'));
            $cartCheck = AddToCart::where('productId', $request->get('id'))->get()->count();
            if ($cartCheck != null) {
                $count = AddToCart::where('userId', Auth::id())->get()->count();
                return response()->json([
                    'status' => 'success',
                    'message' => "Product Already Exists",
                    'code' => 1,
                    'count' => $count,

                ]);
            } else {
                $cartDetail = new AddToCart();
                $cartDetail->productId = $cart->id;
                $cartDetail->userId = Auth::id();
                $cartDetail->quantity = '1';
                $cartDetail->price = $cart->price;
                $cartDetail->save();
                $count = AddToCart::where('userId', Auth::id())->get()->count();
                return response()->json([
                    'status' => 'success',
                    'message' => $cartCheck,
                    'code' => 0,
                    'count' => $count,

                ]);
            }
         }

    }
    public function CartIndex()
    {
        $response = AddToCart::where('userId', '1')->get();
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        $art = AddToCart::with('products')->get();
        $total =AddToCart::where('userId', Auth::id())->get()->sum('price');
        return view('user.addtocart.index', compact('response', 'count', 'art','total'));
    }

    public function Parent($id)
    {
        $child = Category::whereNotNull('parent_id')->get();
        $parent = Category::whereNull('parent_id')->get();
        $childCategory = Category::where('parent_id', $id)->get();
        $count = AddToCart::where('userId', Auth::id())->get()->count();

        $products = Product::whereIn('category_id', $childCategory->pluck('categoryId'))
            ->get();
        return view('user.art.art_detail', compact('products', 'child', 'parent','count'));
    }
    public function Child($id)
    {
        $parent = Category::whereNull('parent_id')->get();
        $child = Category::whereNotNull('parent_id')->get();
        $products = Product::where('category_id', $id)->get();
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        return view('user.art.art_detail', compact('products', 'parent', 'child','count'));
    }

}

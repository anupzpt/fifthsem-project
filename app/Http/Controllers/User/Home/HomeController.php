<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\login\User;
use App\Models\Order\OrderList;
use App\Models\Product\Product;
use App\Models\User\AddToCart\AddToCart;
use App\Models\User\Home\Home;
use App\Models\User\Order\Order;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function Index()
    {

        session()->put(['popupBoxValue']);
        $products = Product::take(3)->get();
        $latestPosts = Product::limit(3)->latest('created_at')->get();
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        $product = DB::table('products')
            ->select('category_id', DB::raw('count(*) as total'))
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->first();
        $popularProducts = DB::table('products')
            ->get();
        $artists = DB::table('users')
        ->where('user_type', '2')
        ->get();
        return view('user.dashboard.dashboard', compact('products','artists', 'latestPosts', 'count','product','popularProducts'));
    }
    public function myOrder()
    {   $userdetail=Auth::User();
        session()->put('popupBoxValue', '2');
        $orders = DB::table('orders')
            ->join('products', 'orders.productId', '=', 'products.id')
            ->select('products.name', 'orders.*')
            ->where('userId', Auth::id())
            ->get();
        $OrderList = Order::with('products')->where('userId', Auth::id())
            ->get();
        $total = Order::where('userId', Auth::id())->get()->sum('price');
        $art = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id')
            ->select('users.email', DB::raw('SUM(orders.price) as total'), 'users.contact', 'orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address', 'orders.OrderRemarks', 'orders.VerifiedRemarks', 'orders.ApproveRemarks', 'orders.RejectedRemarks')
            ->where('orders.userId', '=', Auth::id())
            ->groupBy('users.email', 'users.contact', 'orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address', 'orders.OrderRemarks', 'orders.VerifiedRemarks', 'orders.ApproveRemarks', 'orders.RejectedRemarks')
            ->get();
        return view('user.profileDetail.user-profile', compact('orders', 'OrderList', 'total', 'art','userdetail'));
    }
    public function myAccount()
    {
        $userdetail=Auth::User();
        session()->put('popupBoxValue', '1');
        $orders = DB::table('orders')
            ->join('products', 'orders.productId', '=', 'products.id')
            ->select('products.name', 'orders.*')
            ->where('userId', Auth::id())
            ->get();
        $OrderList = Order::with('products')->get();
        $total = Order::where('userId', Auth::id())->get()->sum('OrderCode->price');
        $art = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id')
            ->select('users.email', DB::raw('SUM(orders.price) as total'), 'users.contact', 'orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address', 'orders.OrderRemarks', 'orders.VerifiedRemarks', 'orders.ApproveRemarks', 'orders.RejectedRemarks')
            ->where('orders.userId', '=', Auth::id())
            ->groupBy('users.email', 'users.contact', 'orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address', 'orders.OrderRemarks', 'orders.VerifiedRemarks', 'orders.ApproveRemarks', 'orders.RejectedRemarks')
            ->get();
        return view('user.profileDetail.user-profile', compact('OrderList', 'art', 'total', 'orders','userdetail'));
    }
    public function artistRegister()
    {
        $userdetail=Auth::User();
        session()->put('popupBoxValue', '3');
        $orders = DB::table('orders')
            ->join('products', 'orders.productId', '=', 'products.id')
            ->select('products.name', 'orders.*')
            ->where('userId', Auth::id())
            ->get();
        $OrderList = Order::with('products')->get();
        $total = Order::where('userId', Auth::id())->get()->sum('price');
        $art = DB::table('orders')
            ->join('users', 'orders.userId', '=', 'users.id')
            ->select('users.email', DB::raw('SUM(orders.price) as total'), 'users.contact', 'orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address', 'orders.OrderRemarks', 'orders.VerifiedRemarks', 'orders.ApproveRemarks', 'orders.RejectedRemarks')
            ->where('orders.userId', '=', Auth::id())
            ->groupBy('users.email', 'users.contact', 'orders.OrderCode', 'users.name', 'orders.payment_status', 'orders.address', 'orders.OrderRemarks', 'orders.VerifiedRemarks', 'orders.ApproveRemarks', 'orders.RejectedRemarks')
            ->get();
        return view('user.profileDetail.user-profile', compact('OrderList', 'art', 'total', 'orders','userdetail'));
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
        if (Auth::id() == null) {
            return response()->json([
                'message' => Auth::check(),
                'code' => 101,
            ]);
        } else {
            $cart = Product::find($request->get('id'));
            $cartCheck = AddToCart::where('productId', $request->get('id'),'userId')
                                    ->where('userId', Auth::id())
                                    ->get()->count();
            if ($cartCheck != null) {
                $count = AddToCart::where('userId', Auth::id())->get()->count();
                return response()->json([
                    'status' => 'success',
                    'message' => "Product Already Exists",
                    'code' => 1,
                    'count' => $count,
                ]);
            } else if ($cart->productStatus == "sold") {
                return response()->json([
                    'status' => 'success',
                    'message' => "Sorry,Product Already Sold.",
                    'code' => 1,
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
                    'message' => "Successfully added",
                    'code' => 0,
                    'count' => $count,

                ]);
            }
        }
    }
    public function CartIndex()
    {
        $response = AddToCart::where('userId', Auth::id())->get();
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        $art = AddToCart::with('products')
            ->where('userId', Auth::id())
            ->get();

        // $art = AddToCart::with('products')->get();
        $total = AddToCart::where('userId', Auth::id())->get()->sum('price');
        return view('user.addtocart.index', compact('response', 'count', 'art', 'total'));
    }

    public function Parent($id)
    {
        $child = Category::whereNotNull('parent_id')->get();
        $parent = Category::whereNull('parent_id')->get();
        $childCategory = Category::where('parent_id', $id)->get();
        $count = AddToCart::where('userId', Auth::id())->get()->count();

        $products = Product::whereIn('category_id', $childCategory->pluck('categoryId'))
            ->get();
        return view('user.art.art_detail', compact('products', 'child', 'parent', 'count'));
    }
    public function Child($id)
    {
        $parent = Category::whereNull('parent_id')->get();
        $child = Category::whereNotNull('parent_id')->get();
        $products = Product::where('category_id', $id)->get();
        $count = AddToCart::where('userId', Auth::id())->get()->count();
        return view('user.art.art_detail', compact('products', 'parent', 'child', 'count'));
    }
}

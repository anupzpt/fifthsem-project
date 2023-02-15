<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use App\Models\login\User;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        // $products =Product::all();
        $products = Product::take(3)->get();
        $latestPosts = Product::limit(3)->latest('created_at')->get();
        return view('user.dashboard.dashboard',compact('products','latestPosts') );
    }
    public function Art(){
        $products = Product::all();
        return view('user.art.art',compact('products'));
    }
}

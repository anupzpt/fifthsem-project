<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\AddToCart\AddToCartController;
use App\Http\Controllers\login\UserController;
use App\Http\Controllers\login\SocialAuthController;
use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\login\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.dashboard')->name('Dashboard');
// });
// Route::get('/', function () {
//     return view('user.dashboard.dashboard', ['list' => User::all()]);
// })->name('dashboard');

// ------------User Part-------------

Route::get('/', [HomeController::class, 'Index'])->name('home.index');
Route::get('/art', [HomeController::class, 'Art'])->name('home.art');
Route::POST('/cart', [HomeController::class, 'Cart'])->name('home.cart');
Route::get('/art/{id}', [HomeController::class, 'Parent'])->name('home.category');
Route::get('/art-child/{id}', [HomeController::class, 'Child'])->name('home.child');


// ------------Admin Part-------------

Route::resource('/admin', DashboardController::class);
Route::resource('/Admin/Category', CategoryController::class);
Route::resource('/Admin/Product', ProductController::class);
Route::resource('/Customer/AddToCart', AddToCartController::class);

// -------------------------------------

Route::get('login', [UserController::class, 'loginIndex'])->name('login');
Route::post('login', [UserController::class, 'authentication'])->name('login');

Route::get('register', [UserController::class, 'registerIndex'])->name('register');
Route::post('register', [UserController::class, 'save'])->name('register');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

//login with google part
Route::get('/redirect', [socialAuthController::class,'redirectToProvider'])->name('googleLogin');
Route::get('/auth/google/callback', [socialAuthController::class,'handleCallback'])->name('google.login.callback');

//login with facebook part
Route::get('/facebookRedirect', [socialAuthController::class, 'redirectToFacebookProvider'])->name('facebookLogin');
Route::get('/auth/facebook/callback', [socialAuthController::class, 'handleFacebookCallback'])->name('facebook.login.callback');

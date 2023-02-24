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
use App\Http\Controllers\Contact\ContactusController;

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
Route::get('/user-profile/my-account', [HomeController::class, 'myAccount'])->name('account');
Route::get('/user-profile/my-order', [HomeController::class, 'myOrder'])->name('order');
Route::get('/user-profile/return-and-cancel', [HomeController::class, 'returnAndCancel'])->name('return');
Route::get('/art', [HomeController::class, 'Art'])->name('home.art');
Route::POST('/cart', [HomeController::class, 'Cart'])->name('home.cart');
Route::get('/cartIndex', [HomeController::class, 'CartIndex'])->name('home.cart.index');
Route::get('/art/{id}', [HomeController::class, 'Parent'])->name('home.category');
Route::get('/art-child/{id}', [HomeController::class, 'Child'])->name('home.child');


// ------------Admin Part-------------

Route::resource('/admin', DashboardController::class)->middleware(['auth']);;
Route::resource('/Admin/Category', CategoryController::class);
Route::resource('/Admin/Product', ProductController::class);
Route::resource('/Customer/AddToCart', AddToCartController::class);
Route::delete('delete-from-cart', [AddToCartController::class, 'delete'])->name('cart.delete');

// -------------------------------------

Route::get('login', [UserController::class, 'loginIndex'])->name('login');
Route::post('login', [UserController::class, 'authentication'])->name('login');
Route::post('/update-user-data', [UserController::class, 'updateUserData'])->name('update-user-data');

Route::get('register', [UserController::class, 'registerIndex'])->name('register');
Route::post('register', [UserController::class, 'save'])->name('register');

Route::get('logout', [UserController::class, 'logout'])->name('logout');

//login with google part
Route::get('/redirect', [socialAuthController::class,'redirectToProvider'])->name('googleLogin');
Route::get('/auth/google/callback', [socialAuthController::class,'handleCallback'])->name('google.login.callback');

//login with facebook part
Route::get('/facebookRedirect', [socialAuthController::class, 'redirectToFacebookProvider'])->name('facebookLogin');
Route::get('/auth/facebook/callback', [socialAuthController::class, 'handleFacebookCallback'])->name('facebook.login.callback');

//Contact us
Route::get('/contact',[ContactusController::class,'contact']);

Route::post('/send-message',[ContactusController::class,'sendEmail'])->name('contact.send');

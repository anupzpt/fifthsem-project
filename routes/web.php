<?php

use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\AddToCart\AddToCartController;
use App\Http\Controllers\login\UserController;
use App\Http\Controllers\login\SocialAuthController;
use App\Http\Controllers\User\Home\HomeController;
use App\Http\Controllers\Admin\UserList\UserListController;
use Illuminate\Support\Facades\Route;
use App\Models\login\User;
use App\Http\Controllers\Contact\ContactusController;
use App\Http\Controllers\Forget\ForgetController;

use App\Http\Controllers\Admin\AdminList\AdminController;
use App\Http\Controllers\Admin\ArtistList\ArtistController;
use App\Http\Controllers\Admin\Order\OrderListController;
use App\Http\Controllers\User\Order\UserOrderController;
use App\Http\Controllers\Artistregister\ArtistregisterController;

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
Route::get('/user-profile/artist-register', [HomeController::class, 'artistRegister'])->name('artist-register');
Route::get('/art', [HomeController::class, 'Art'])->name('home.art');
Route::POST('/cart', [HomeController::class, 'Cart'])->name('home.cart');
Route::get('/cartIndex', [HomeController::class, 'CartIndex'])->name('home.cart.index');
Route::get('/art/{id}', [HomeController::class, 'Parent'])->name('home.category');
Route::get('/art-child/{id}', [HomeController::class, 'Child'])->name('home.child');
Route::resource('/Customer/UserOrderList', UserOrderController::class);
Route::post('/UserOrderList/store', [UserOrderController::class,'orderStore'])->name('UserOrderList.orderstore');
Route::post('/UserOrderList/Check', [UserOrderController::class,'CheckCart'])->name('UserOrderList.check');


// Route::get('/product-status', [OrderListController::class ,'change_paymentStatus'])->name('product.status');

// ------------Admin Part-------------

Route::resource('/admin', DashboardController::class)->middleware(['auth']);
Route::resource('/Admin/Category', CategoryController::class);
Route::resource('/Admin/Product', ProductController::class);
Route::resource('/Admin/OrderList', OrderListController::class);
Route::post('/admin/category/delete-category',[CategoryController::class,'DeleteCategory'])->name('category.deletecategory');


Route::resource('/Customer/Order', AddToCartController::class);
Route::delete('delete-from-cart', [AddToCartController::class, 'delete'])->name('cart.delete');
Route::resource('/Admin/AdminList', AdminController::class);
Route::resource('/Admin/UserList', UserListController::class);
Route::get('artistList', [ArtistController::class,'index'])->name('artistList');
Route::get('artistRequest', [ArtistController::class,'request'])->name('artistRequest');
Route::get('/artistRegister/{id}', [ArtistController::class,'update'])->name('artistRegister');
Route::get('/deleteRequest/{id}', [ArtistController::class,'delete'])->name('deleteRequest');

// -------------------------------------

Route::get('login', [UserController::class, 'loginIndex'])->name('login1');
Route::post('login', [UserController::class, 'authentication'])->name('login');
Route::post('/update-user-data', [UserController::class, 'updateUserData'])->name('update-user-data');

Route::get('register', [UserController::class, 'registerIndex'])->name('register1');
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


//Forget password
Route::get('/forget-password',[ForgetController::class,'forgetPasswordLoad']);
Route::post('/forget-password',[ForgetController::class,'forgetPassword'])->name('forgetPassword');

Route::get('/reset-password/{token}',[ForgetController::class,'resetPasswordLoad']);
Route::post('/reset-password',[ForgetController::class,'resetPassword'])->name('resetPassword');

// Checker Maker
Route::get('/orders/verify/{orderCode}',[OrderListController::class,'ViewVerifyOrderDetail'])->name('orders.verify');
Route::post('/orders/verify-details',[OrderListController::class,'VerifyOrderDetail'])->name('orders.verifyDetail');

Route::get('/orders/approve/{orderCode}',[OrderListController::class,'ViewApprveOrderDetail'])->name('orders.approve');
Route::post('/orders/approve-details',[OrderListController::class,'ApproveOrderDetail'])->name('orders.approveDetail');
Route::get('/orders/view/{orderCode}',[OrderListController::class,'ViewOrderDetail'])->name('orders.view');



//Artist registration

Route::post('login-artist', [ArtistregisterController::class,'artist'])->name('login-artist');


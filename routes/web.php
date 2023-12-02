<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', ['App\Http\Controllers\WelcomeController', 'index'])->name('welcome');
Route::get('categories', ['App\Http\Controllers\WelcomeController', 'categories'])->name('categories');
Route::get('category/{slug}', ['App\Http\Controllers\WelcomeController', 'category'])->name('category');
Route::get('product/{id}', ['App\Http\Controllers\WelcomeController', 'product'])->name('product');
Route::get('products', ['App\Http\Controllers\WelcomeController', 'products'])->name('products');

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('admin/index', ['App\Http\Controllers\Admin\AdminDashboardController', 'index'])->name('admin.index');
    Route::get('user/destroy/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'destroyUser'])->name('destroy.user');
    Route::get('user/restore/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'restoreUser'])->name('restore.user');
    Route::get('user/delete/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'deleteUser'])->name('delete.user');
});
Route::group(['middleware' => ['auth', 'author']], function(){
    Route::get('author/index', ['App\Http\Controllers\Author\AuthorDashboardController', 'index'])->name('author.index');
});

Route::get('password/reset/form', ['App\Http\Controllers\Auth\PasswordResetController', 'showForm'])->name('password.reset.form');
Route::post('reset/password', ['App\Http\Controllers\Auth\PasswordResetController', 'store'])->name('reset.password');
Route::get('forgot-password', ['App\Http\Controllers\Auth\ForgotPasswordController', 'create'])->name('password.reque');
Route::post('forgot-password', ['App\Http\Controllers\Auth\ForgotPasswordController', 'store'])->name('password.email');
Route::get('/password/reset/{token}', ['App\Http\Controllers\Auth\ResetPasswordController', 'create'])->name('password.reset');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Category
Route::get('admin/categories', ['App\Http\Controllers\Admin\CategoryController', 'index'])->name('admin.categories');
Route::post('admin/category/store', ['App\Http\Controllers\Admin\CategoryController', 'store'])->name('admin.category.store');
Route::get('admin/category/delete/{id}', ['App\Http\Controllers\Admin\CategoryController', 'delete'])->name('admin.category.delete');

//Admin Product
Route::get('admin/products', ['App\Http\Controllers\Admin\ProductController', 'index'])->name('admin.products');
Route::get('admin/product/create', ['App\Http\Controllers\Admin\ProductController', 'create'])->name('product.create');
Route::post('admin/product/store', ['App\Http\Controllers\Admin\ProductController', 'store'])->name('product.store');
Route::get('admin/product/edit/{id}', ['App\Http\Controllers\Admin\ProductController', 'edit'])->name('product.edit');
Route::post('admin/product/update/{id}', ['App\Http\Controllers\Admin\ProductController', 'update'])->name('product.update');
Route::get('admin/product/delete/{id}', ['App\Http\Controllers\Admin\ProductController', 'delete'])->name('product.delete');
Route::get('admin/product/restore/{id}', ['App\Http\Controllers\Admin\ProductController', 'restore'])->name('product.restore');
Route::get('admin/product/destroy/{id}', ['App\Http\Controllers\Admin\ProductController', 'destroy'])->name('product.destroy');
Route::post('admin/product/updatePhoto/{id}', ['App\Http\Controllers\Admin\ProductController', 'updatePhoto'])->name('admin.product.updatePhoto');
Route::get('admin/product/status0/{id}', ['App\Http\Controllers\Admin\ProductController', 'status0'])->name('product.status0');
Route::get('admin/product/status1/{id}', ['App\Http\Controllers\Admin\ProductController', 'status1'])->name('product.status1');
Route::get('admin/equipmentsS', ['App\Http\Controllers\Admin\ProductController', 'indexS'])->name('admin.equipmentsS');
Route::get('admin/equipmentsA', ['App\Http\Controllers\Admin\ProductController', 'indexA'])->name('admin.equipmentsA');
Route::post('admin/product/amount/{id}', ['App\Http\Controllers\Admin\ProductController', 'amount'])->name('amount.product');

Auth::routes();

// Pages
Route::get('delivery', [App\Http\Controllers\WelcomeController::class, 'delivery'])->name('delivery');
Route::get('promo', [App\Http\Controllers\WelcomeController::class, 'promo'])->name('promo');
Route::get('contacts', [App\Http\Controllers\WelcomeController::class, 'contacts'])->name('contacts');
Route::get('wash', [App\Http\Controllers\WelcomeController::class, 'wash'])->name('wash');

//Wishlist
Route::get('wishlist', ['App\Http\Controllers\WishlistController', 'wishlist'])->name('wishlist');
Route::post('wishlist/add', ['App\Http\Controllers\WishlistController', 'add'])->name('wishlist.add');
Route::get('wishlist/destroy/{id}', ['App\Http\Controllers\WishlistController', 'destroy'])->name('wishlist.destroy');
Route::get('favorite/{id}', ['App\Http\Controllers\WishlistController', 'favorite'])->name('favorite');

//Cart
Route::get('carts', ['App\Http\Controllers\CartController', 'index'])->name('carts');
Route::post('cart/add/{id}', ['App\Http\Controllers\CartController', 'add'])->name('cart.add');
Route::get('cart/delete/{rowId}', ['App\Http\Controllers\CartController', 'delete'])->name('cart.delete');
Route::post('cart/update', ['App\Http\Controllers\CartController', 'update'])->name('cart.update');
Route::get('checkout', ['App\Http\Controllers\CartController', 'checkout'])->name('checkout');
Route::post('check', ['App\Http\Controllers\CartController', 'check'])->name('check');

//Account
Route::get('account', ['App\Http\Controllers\AccountController', 'index'])->name('account');
Route::post('personal', ['App\Http\Controllers\AccountController', 'personal'])->name('personal');
Route::post('shipping', ['App\Http\Controllers\AccountController', 'shipping'])->name('shipping');

//Subscriber
Route::post('subscribe', ['App\Http\Controllers\SubscriberController', 'subscribe'])->name('subscribe');
Route::get('admin/subscribers', ['App\Http\Controllers\Admin\SubscriberController', 'index'])->name('admin.subscribers');
Route::get('admin/subscriber/delete/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'delete'])->name('delete.subscriber');
Route::get('admin/subscriber/destroy/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'destroy'])->name('destroy.subscriber');
Route::get('admin/subscriber/restore/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'restore'])->name('restore.subscriber');
Route::get('admin/subscriber/formMail/{userEmail}', ['App\Http\Controllers\Admin\SubscriberController', 'formMail'])->name('formMail.subscriber');
Route::post('admin/subscriber/sendMail', ['App\Http\Controllers\Admin\SubscriberController', 'sendMail'])->name('sendMail.subscriber');
Route::post('admin/alerts/sendMail', ['App\Http\Controllers\Admin\AlertsController', 'sendMail'])->name('sendMail.alerts');

//Admin Orders
Route::get('admin/neworders', [App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.neworders');
Route::get('admin/order/delete/{id}', [App\Http\Controllers\Admin\OrderController::class, 'orderDelete'])->name('admin.order.delete');
Route::get('admin/order/show/{id}', [App\Http\Controllers\Admin\OrderController::class, 'show'])->name('admin.order.show');
Route::get('admin/order/pending/{id}', [App\Http\Controllers\Admin\OrderController::class, 'pending'])->name('admin.order.pending');
Route::get('admin/orders/process', [App\Http\Controllers\Admin\OrderController::class, 'ordersProcess'])->name('admin.orders.process');
Route::get('admin/order/process/{id}', [App\Http\Controllers\Admin\OrderController::class, 'process'])->name('admin.order.process');
Route::get('admin/orders/delivered', [App\Http\Controllers\Admin\OrderController::class, 'ordersDelivered'])->name('admin.orders.delivered');
Route::get('admin/order/delivered/{id}', [App\Http\Controllers\Admin\OrderController::class, 'delivered'])->name('admin.order.delivered');
Route::get('admin/order/canceled/{id}', [App\Http\Controllers\Admin\OrderController::class, 'canceled'])->name('admin.order.canceled');
Route::get('admin/orders/canceled', [App\Http\Controllers\Admin\OrderController::class, 'ordersCanceled'])->name('admin.orders.canceled');

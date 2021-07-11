<?php

use Illuminate\Support\Facades\Route;
use App\Product;

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

Route::get('/', function () {
    return view('welcome');
});

//Vendor Routes

Route::group(['middleware' => ['auth','vendor']], function () {
    // Route::get('/vendor/dashboard', function () {
    //     return view('vendor.vendor_dashboard');
    // });

    Route::get('/vendor/dashboard','ProductController@dashboard');

    //Category Routes
    Route::get('/vendor/add-category', 'CategoryController@addCategory');
    Route::post('/categories', 'CategoryController@Categories');
    Route::get('/vendor/view-category', 'CategoryController@viewCategory');
    Route::get('/vendor/edit-category/{id}', 'CategoryController@editCategory');
    Route::post('/vendor/updated-category/{id}', 'CategoryController@updatedCategory');
    Route::post('/vendor/delete-category/{id}', 'CategoryController@deleteCategory');

    //Product Routes
   

    Route::get('/vendor/add-products', 'ProductController@addProduct');
    Route::post('/vendor/store-products', 'ProductController@storeProduct');
    Route::get('/vendor/view-products', 'ProductController@viewProduct');
    Route::get('/vendor/edit-product/{id}', 'ProductController@editProduct');
    Route::post('/vendor/update-product/{id}', 'ProductController@updateProduct');
    Route::post('/vendor/delete-product/{id}', 'ProductController@deleteProduct');

    //Order Routes
    Route::get('/vendor/view-orders','OrderController@viewOrders');
    Route::get('/vendor/Order-Details/{id}','OrderController@OrderDetails');
    
    //Profile Routes
    Route::get('/my-profile','AccountController@vendorProfile');
    Route::post('/update-vendor-profile/{id}','AccountController@updateVendorProfile');

    //Reports Routes
    Route::get('/vendor/reports', 'ProductController@reports');
});


//Customer Routes

Route::group(['middleware' => ['auth','customer']], function () {
    // Route::get('/customer', 'HomeController@index')->name('customer');

Route::get('/home','CustomerController@index');
Route::get('/products/{url}', 'ProductController@productDetails');
Route::get('/product/{id}','ProductController@product');
Route::get('/product/update-quantity/{id}/{quantity}','ProductController@updateCartQuantity');

//cart Routes

Route::post('/add-cart','ProductController@addtocart');
Route::get('/cart','ProductController@cart');
Route::get('/cart/product/{id}','ProductController@deleteCartProduct');
Route::get('/cart/update-quantity/{id}/{quantity}','ProductController@updateCartQuantity');

//checkcout

Route::get('/checkout','ProductController@checkout');
Route::get('/paypal','ProductController@paypal');
Route::get('/account','AccountController@myProfile');
Route::post('/update-profile/{id}','AccountController@updateProfile');


//Order Routes
Route::post('/order','ProductController@order');
Route::get('/thanks','ProductController@thanks');
Route::get('/user-orders','ProductController@userOrders');
Route::get('/orders/{id}','ProductController@orderDetails');

//Search Route
Route::post('/search-products','ProductController@searchProducts');


});


Auth::routes();



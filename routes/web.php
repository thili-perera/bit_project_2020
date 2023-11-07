<?php

use Illuminate\Support\Facades\Route;

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
// ================================================================================================

/* Dashboard */

// ================================================================================================

/* Login Management */

/* Login Page */

Route::get('dashboard/signin', 'Backend\Auth\Login\LoginPageController@login')->name('login');

// Dashboard Auth
Route::namespace('Backend\Auth\Login')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::post('/verify', 'LoginController@verify')->name('login.verify');
    Route::get('/forgot/password', 'LoginController@forgotpassword')->name('forgotpassword');
    Route::post('/reset/password', 'LoginController@resetpassword')->name('resetpassword');
    Route::post('/frontendverify', 'LoginController@frontendverify')->name('login.frontendverify');

    Route::get('/logout', 'LoginController@logout')->name('logout');
});

// Dashboard Welcome
Route::namespace('Backend\Home')->prefix('dashboard')->name('dashboard.')->middleware('can:dashboard-users')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
}); 

/* User Mamangement */
Route::namespace('Backend\User')->prefix('dashboard')->name('dashboard.user.')->middleware('can:manage-users')->group(function () {
    Route::get('/allusers', 'UserController@index')->name('index');
    Route::get('/adduser', 'UserController@create')->name('create');
    Route::post('/saveuser', 'UserController@store')->name('store');
    Route::get('/user/{user}', 'UserController@show')->name('show');
    Route::get('/edit/user/{user}', 'UserController@edit')->name('edit');
    Route::delete('/userdelete/{user}', 'UserController@destroy')->name('destroy');
});

Route::put('dashboard/update/user/{user}', 'Backend\User\UserController@update')->name('dashboard.user.update');
Route::get('dashboard/userprofile/{user}', 'Backend\User\UserController@userprofile')->middleware('can:dashboard-users')->name('dashboard.user.userprofile');

/* Category Mamangement */
Route::namespace('Backend\Product')->prefix('dashboard')->name('dashboard.category.')->middleware('can:manage-users')->group(function () {
    Route::get('/allcategories', 'CategoryController@index')->name('index');
    Route::get('/addcategory', 'CategoryController@create')->name('create');
    Route::post('/savesubcategory', 'CategoryController@substore')->name('substore');
    Route::post('/saveparentcategory', 'CategoryController@parentstore')->name('parentstore');
    Route::get('/category/view/{category}', 'CategoryController@show')->name('show');
    Route::get('/edit/category/{category}', 'CategoryController@edit')->name('edit');
    Route::put('/update/category/{category}', 'CategoryController@update')->name('update');
    Route::delete('/categorydelete/{category}', 'CategoryController@destroy')->name('destroy');
});

/* Product Manangement */
Route::namespace('Backend\Product')->prefix('dashboard')->name('dashboard.product.')->middleware('can:manage-users')->group(function () {
    Route::get('/allproducts', 'ProductController@index')->name('index');
    Route::get('/addproduct', 'ProductController@create')->name('create');
    Route::post('/saveproduct', 'ProductController@store')->name('store');
    Route::get('/product/view/{product}', 'ProductController@show')->name('show');
    Route::get('/edit/product/{product}', 'ProductController@edit')->name('edit');
    Route::put('/update/product/{product}', 'ProductController@update')->name('update');
    Route::delete('/productdelete/{product}', 'ProductController@destroy')->name('destroy');
});

/* Brand */
Route::namespace('Backend\Brand')->prefix('dashboard')->name('dashboard.brand.')->middleware('can:manage-users')->group(function () {
    Route::get('/allbrands', 'BrandController@index')->name('index');
    Route::get('/brand/create', 'BrandController@create')->name('create');
    Route::post('/brand/store', 'BrandController@store')->name('store');
    Route::delete('/brand/delete/{id}', 'BrandController@destroy')->name('destroy');
});

/* Supplier */
Route::namespace('Backend\Supplier')->prefix('dashboard')->name('dashboard.supplier.')->group(function () {
    Route::get('/allsuppliers', 'SupplierController@index')->name('index');
    Route::get('/supplier/create', 'SupplierController@create')->name('create');
    Route::get('/supplier/show/{id}', 'SupplierController@show')->name('show');
    Route::get('/supplier/products', 'SupplierController@supplierproduct')->name('supplierproduct');
    Route::post('/supplier/products/filter', 'SupplierController@supplierproductFilter')->name('supplierproductFilter');
    Route::post('/supplier/store', 'SupplierController@store')->name('store');
    Route::get('/supplier/edit/{supplier}', 'SupplierController@edit')->name('edit');
    Route::put('/supplier/update/{supplier}', 'SupplierController@update')->name('update');
    Route::delete('/supplier/delete/{id}', 'SupplierController@destroy')->name('destroy');
});

/* Customer Mamangement */
Route::namespace('Backend\Customer')->prefix('dashboard')->name('dashboard.customer.')->middleware('can:manage-users')->group(function () {
    Route::get('/allcustomers', 'CustomerController@index')->name('index');
});

/* Driver Mamangement */
Route::namespace('Backend\Driver')->prefix('dashboard')->name('dashboard.driver.')->middleware('can:manage-users')->group(function () {
    Route::get('/alldrivers', 'DriverController@index')->name('index');
});

/* Order Mamangement */
Route::namespace('Backend\Order')->prefix('dashboard')->name('dashboard.order.')->middleware('can:manage-users')->group(function () {
    Route::get('/allorders', 'OrderController@index')->name('index');
    Route::get('/standardorders', 'OrderController@standard')->name('standard');
    Route::get('/giftorders', 'OrderController@gift')->name('gift');
    Route::get('/order/show/{id}', 'OrderController@show')->name('show');
    // Route::put('/order/update/{id}', 'OrderController@update')->name('update');
    Route::post('/order/invoice/{id}', 'OrderController@invoice')->name('invoice');
    Route::put('/order/deliveryperson/update/{id}', 'OrderController@delperson')->name('delperson');
});

Route::put('dashboard/order/{id}/updates', 'Backend\Order\OrderController@update')->name('dashboard.order.update');

/* Delivery Mamangement */
Route::namespace('Backend\Delivery')->prefix('dashboard')->name('dashboard.delivery.')->middleware('can:dashboard-users')->group(function () {
    Route::get('/alldeliveries', 'DeliveryController@index')->name('index');
    Route::get('/delivery/view/{delivery}', 'DeliveryController@show')->name('show');
    Route::put('/delivery/update/{delivery}', 'DeliveryController@update')->name('update');
});

/* Delivery Area Mamangement */
Route::namespace('Backend\DeliveryArea')->prefix('dashboard')->name('dashboard.deliveryarea.')->middleware('can:manage-users')->group(function () {
    Route::get('/deliveryareas', 'DeliveryAreaController@index')->name('index');
    Route::get('/deliveryarea/create', 'DeliveryAreaController@create')->name('create');
    Route::post('/deliveryarea/store', 'DeliveryAreaController@store')->name('store');
    Route::get('/deliveryarea/edit/{id}', 'DeliveryAreaController@edit')->name('edit');
    Route::put('/deliveryarea/update/{id}', 'DeliveryAreaController@update')->name('update');
    Route::delete('/deliveryarea/delete/{id}', 'DeliveryAreaController@destroy')->name('destroy');
});

/* Vehicle Mamangement */
Route::namespace('Backend\Vehicle')->prefix('dashboard')->name('dashboard.vehicle.')->group(function () {
    Route::get('/allvehicles', 'VehicleController@index')->name('index');
    Route::get('/addvehicle', 'VehicleController@create')->name('create');
    Route::post('/storevehicle', 'VehicleController@store')->name('store');
    Route::get('/edit/vehicle/{id}', 'VehicleController@edit')->name('edit');
    Route::put('/order/update/{id}', 'VehicleController@update')->name('update');
    Route::delete('/order/delete/{id}', 'VehicleController@destroy')->name('destroy');
});

/* Complaints */

Route::namespace('Backend\Complaint')->prefix('dashboard')->name('dashboard.complaint.')->middleware('can:manage-users')->group(function () {
    Route::get('/allcomplaints', 'ComplaintController@index')->name('index');
    Route::get('/pendingcomplaints', 'ComplaintController@pending')->name('pending');
    Route::get('/reviewingcomplaints', 'ComplaintController@reviewing')->name('reviewing');
    Route::get('/complaint/view/{id}', 'ComplaintController@show')->name('show');
    Route::put('/complaint/update/{id}', 'ComplaintController@update')->name('update');
});

/* Inventory Mamangement */
Route::namespace('Backend\Inventory')->prefix('dashboard')->name('dashboard.inventory.')->middleware('can:manage-users')->group(function () {
    Route::get('/inventory/index', 'InventoryController@index')->name('index');
    Route::get('/newstock', 'InventoryController@create')->name('create');
    Route::post('/newstock/store', 'InventoryController@store')->name('store');
});

/* Report Mamangement */
Route::namespace('Backend\Report')->prefix('dashboard')->name('dashboard.report.')->middleware('can:manage-users')->group(function () {
    Route::get('/report/stock', 'ReportController@stock')->name('stock');
    Route::get('/report/order', 'ReportController@order')->name('order');
    Route::get('/report/income', 'ReportController@income')->name('income');
    Route::get('/report/user', 'ReportController@user')->name('user');
    Route::get('/report/customer', 'ReportController@customer')->name('customer');
    Route::get('/report/supplier', 'ReportController@supplier')->name('supplier');
    Route::get('/report/delivery', 'ReportController@delivery')->name('delivery');
    Route::get('/report/saledproduct', 'ReportController@saledproduct')->name('saledproduct');
    Route::get('/report/payment', 'ReportController@payment')->name('payment');
    Route::get('/report/tracking', 'ReportController@tracking')->name('tracking');
    Route::post('/report/orderFilter', 'ReportController@orderFilter')->name('orderFilter');
    Route::post('/report/incomeFilter', 'ReportController@incomeFilter')->name('incomeFilter');
    Route::post('/report/stockFilter', 'ReportController@stockFilter')->name('stockFilter');
    Route::post('/report/userFilter', 'ReportController@userFilter')->name('userFilter');
    Route::post('/report/customerFilter', 'ReportController@customerFilter')->name('customerFilter');
    Route::post('/report/supplierFilter', 'ReportController@supplierFilter')->name('supplierFilter');
    Route::post('/report/saledproductFilter', 'ReportController@saledproductFilter')->name('saledproductFilter');
    Route::post('/report/deliveryFilter', 'ReportController@deliveryFilter')->name('deliveryFilter');
    Route::post('/report/paymentFilter', 'ReportController@paymentFilter')->name('paymentFilter');
    Route::post('/report/trackingFilter', 'ReportController@trackingFilter')->name('trackingFilter');
});

// ================================================================================================

/* Frontend */

// ================================================================================================


/* Login Page */

Route::namespace('Frontend\Auth\Login')->name('frontend.')->group(function () {
    Route::get('/signin', 'LoginPageController@login')->name('login');
    Route::get('/forgotpassword', 'LoginPageController@forgotpassword')->name('forgotpassword');
    Route::post('/resetpassword', 'LoginPageController@resetpassword')->name('resetpassword');
    Route::get('/logout', 'LoginPageController@logout')->name('logout');
});

/* Registration */
Route::namespace('Frontend\Auth\Registration')->name('frontend.')->group(function () {
    Route::get('/signup', 'RegistrationController@index')->name('signup');
    Route::post('/user/store', 'RegistrationController@store')->name('store');
    Route::get('/user/emailverify/{verification_code}', 'RegistrationController@emailverify')->name('emailverify');
});

/* Profile Page */
Route::namespace('Frontend\Auth\Profile')->name('frontend.profile.')->group(function () {
    Route::get('/profile', 'ProfileController@index')->name('index');
    Route::put('/profile/update/{slug}', 'ProfileController@update')->name('update');
});


/* Home Page */
Route::namespace('Frontend\Home')->name('frontend.home.')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/allproducts', 'HomeController@allproducts')->name('allproducts');
    Route::post('/search/results', 'HomeController@search')->name('search');
    Route::get('/aboutus', 'HomeController@about')->name('about');
    Route::get('/contactus', 'HomeController@contact')->name('contact');
    Route::get('/side', 'HomeController@side')->name('side');
});

/* Product */
Route::namespace('Frontend\Product')->name('frontend.product.')->group(function () {
    Route::get('/product/{slug}', 'ProductController@index')->name('index');
    Route::post('/product/action', 'ProductController@action')->name('action');
});

/* category */
Route::namespace('Frontend\Category')->name('frontend.category.')->group(function () {
    Route::get('/category/{slug}', 'CategoryPageController@catpage')->name('catpage');
    Route::get('/category/toys', 'CategoryPageController@toys')->name('toys');
});

/* Wishlist */
Route::namespace('Frontend\Wishlist')->name('frontend.wishlist.')->group(function () {
    Route::get('/wishlist', 'WishController@index')->name('index');
    Route::get('/wishlist/addtowishlist/{slug}', 'WishController@addTowish')->name('addTowish');
    Route::delete('/wishlist/wishdelete/{slug}', 'WishController@wishdelete')->name('wishdelete');
});

/* Cart */

Route::namespace('Frontend\Cart')->name('frontend.cart.')->group(function () {
    Route::get('/cart', 'CartController@index')->name('index');
    Route::get('/bulkcart', 'CartController@bulkcart')->name('bulkcart');
    Route::get('/cart/addtocart/{slug}', 'CartController@addTocart')->name('addTocart');
    Route::put('/update/cart/{slug}', 'CartController@updatequantity')->name('updatequantity');
    Route::delete('/cart/deleteitem/{slug}', 'CartController@itemdelete')->name('itemdelete');
});

/* Gift */

Route::namespace('Frontend\Gift')->name('frontend.gift.')->group(function () {
    Route::get('/gift', 'GiftController@index')->name('index');
    Route::get('/gift/addtogift/{slug}', 'GiftController@addTogift')->name('addTogift');
    Route::put('/update/gift/{slug}', 'GiftController@updatequantity')->name('updatequantity');
    Route::delete('/gift/deleteitem/{slug}', 'GiftController@itemdelete')->name('itemdelete');
});


/* Checkout */

Route::namespace('Frontend\Checkout')->name('frontend.checkout.')->group(function () {
    Route::get('/checkout', 'CheckoutController@index')->name('index');
    Route::get('/giftcheckout', 'CheckoutController@giftcheckout')->name('giftcheckout');
    Route::post('/store', 'CheckoutController@store')->name('store');
});

/* Order */
Route::namespace('Frontend\Order')->name('frontend.order.')->group(function () {
    Route::get('/allorders', 'OrdertController@index')->name('index');
    Route::get('/view/order/{id}', 'OrdertController@show')->name('show');
});

/* Review */
Route::namespace('Frontend\Review')->name('frontend.review.')->group(function () {
    Route::post('/review/{slug}', 'ReviewController@store')->name('store');
});

/* Tracking */
Route::namespace('Frontend\Tracking')->name('frontend.tracking.')->group(function () {
    Route::get('/track/{id}', 'TrackingController@index')->name('index');
});

/* Complaint */
Route::namespace('Frontend\Complaint')->name('frontend.complaint.')->group(function () {
    Route::get('/complaint/{id}', 'ComplaintController@index')->name('index');
    Route::post('/complaint/store/{id}', 'ComplaintController@store')->name('store');
});

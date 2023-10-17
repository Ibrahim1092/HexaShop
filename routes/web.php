<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\ProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('site.index');
// });
// Dashboard
// Route::get('/admin','App\Http\Controllers\dashboardController@login')->name('admin');
// Route::get('/admin/accept' ,'App\Http\Controllers\dashboardController@accept')->name('admin/accept');
// Route::post('/admin/dashboard' , 'App\Http\Controllers\dashboardController@showdash')->name('admin/dashboard');

//AdminLogin
Route::get('/admin' , 'App\Http\Controllers\Admin\AdminLoginController@index')->name('admin/login');
Route::post('/admin/approval' , 'App\Http\Controllers\Admin\AdminLoginController@approval')->name('admin/approval');
Route::post('/admin/logout' , 'App\Http\Controllers\Admin\AdminLoginController@logout')->name('admin/logout');
//AdminRegisteration
Route::get('/admin/register' , 'App\Http\Controllers\Admin\AdminRegisterationController@index')->name('admin/register');
Route::post('/admin/check','App\Http\Controllers\Admin\AdminRegisterationController@check')->name('admin/check');
Auth::routes();
Route::middleware('auth:admin')->group(function () {
//product
Route::get('/admin/products' , 'App\Http\Controllers\dashboardController@index')->name('admin/show');
Route::get('/admin/create','App\Http\Controllers\dashboardController@create')->name('admin/create');
Route::post('/admin/store','App\Http\Controllers\ProductController@store')->name('admin/store');
Route::get('edit/{slug}','App\Http\Controllers\ProductController@edit')->name('admin/edit');
Route::post('update/{slug}','App\Http\Controllers\ProductController@update')->name('admin/update');
Route::get('show/{slug}','App\Http\Controllers\ProductController@show')->name('admin/showp');
Route::get('delete/{id}','App\Http\Controllers\ProductController@Trashed')->name('admin/softdelete');
Route::get('admin/trashbin','App\Http\Controllers\ProductController@trashbin')->name('admin/Trashbin');
Route::get('destroy/{id}','App\Http\Controllers\ProductController@destroy')->name('admin/harddelete');
Route::get('restore/{id}','App\Http\Controllers\ProductController@restore')->name('admin/restore');
//category
Route::get('/admin/showcategory','App\Http\Controllers\dashboardController@showcategory')->name('admin/showcategory');
Route::get('/admin/createcategory','App\Http\Controllers\dashboardController@createcategory')->name('admin/createcategory');
Route::get('/admin/storecategory','App\Http\Controllers\CategoriesController@store')->name('admin/storecategory');
Route::get('editcategor/{id}','App\Http\Controllers\CategoriesController@edit')->name('admin/editcategory');
Route::get('updatecategory/{id}','App\Http\Controllers\CategoriesController@update')->name('admin/updatecategory');
Route::get('showcategory/{id}','App\Http\Controllers\CategoriesController@show')->name('admin/showc');
Route::get('deletecategory/{id}','App\Http\Controllers\CategoriesController@destroy')->name('admin/deletecategory');
//class
Route::get('/admin/showclass','App\Http\Controllers\dashboardController@showclass')->name('admin/showclass');
Route::get('/admin/createclass','App\Http\Controllers\dashboardController@createclass')->name('admin/createclass');
Route::get('/admin/store','App\Http\Controllers\TypesController@store')->name('admin/storeclass');
Route::get('editclass/{id}','App\Http\Controllers\TypesController@edit')->name('admin/editclass');
Route::get('updateclass/{id}','App\Http\Controllers\TypesController@update')->name('admin/updateclass');
Route::get('showclass/{id}','App\Http\Controllers\TypesController@show')->name('admin/showcl');
Route::get('deleteclass/{id}','App\Http\Controllers\TypesController@destroy')->name('admin/deleteclass');
//HomePage
Route::get('/admin/homepage','App\Http\Controllers\HomepageController@index')->name('admin/homepage');
Route::get('/edithome/{id}','App\Http\Controllers\HomepageController@edit')->name('homepage/edit');
Route::post('/updatehome/{id}','App\Http\Controllers\HomepageController@update')->name('homepage/update');
Route::get('/admin/homepage/create','App\Http\Controllers\HomepageController@create')->name('homepage/create');
Route::post('/admin/homepage/store','App\Http\Controllers\HomepageController@store')->name('homepage/store');
//About_us
Route::get('/admin/aboutus','App\Http\Controllers\AboutController@index')->name('admin/aboutus');
Route::get('/editabout/{id}','App\Http\Controllers\AboutController@edit')->name('aboutus/edit');
Route::post('/updateabout/{id}','App\Http\Controllers\AboutController@update')->name('aboutus/update');
Route::get('/admin/aboutus/create','App\Http\Controllers\AboutController@create')->name('aboutus/create');
Route::post('/admin/aboutus/store','App\Http\Controllers\AboutController@store')->name('aboutus/store');
//Services
Route::get('/admin/showservices','App\Http\Controllers\ServiceController@index')->name('admin/showservice');
Route::get('/admin/createservice','App\Http\Controllers\ServiceController@create')->name('admin/createservice');
Route::post('/admin/storeservice','App\Http\Controllers\ServiceController@store')->name('admin/storeservice');
Route::get('editservice/{id}','App\Http\Controllers\ServiceController@edit')->name('admin/editservice');
Route::post('updateservice/{id}','App\Http\Controllers\ServiceController@update')->name('admin/updateservice');
Route::post('deleteservice/{id}','App\Http\Controllers\ServiceController@destroy')->name('admin/deleteservice');
});
Route::middleware('auth')->group(function () {
//cart
Route::get('/user/cart','App\Http\Controllers\CartController@index')->name('/cart');
Route::get('/cart/add/{id}','App\Http\Controllers\CartController@store')->name('/addtocart');
Route::post('/cart/update/{id}','App\Http\Controllers\CartController@update')->name('/updatecart');
Route::get('/cart/remove/{id}','App\Http\Controllers\CartController@destroy')->name('/removefromcart');
Route::get('/cart/checkout','App\Http\Controllers\CartController@checkout')->name('/user/checkout');
});
//Site
Route::get('/','App\Http\Controllers\UserInterfaceController@index')->name('/home');
Route::get('/ourproduct','App\Http\Controllers\UserInterfaceController@ourproduct')->name('/user/ourproduct');
Route::get('/aboutus','App\Http\Controllers\UserInterfaceController@aboutus')->name('/user/aboutus');
Route::get('/contactus','App\Http\Controllers\UserInterfaceController@contactus')->name('/user/contactus');
Route::get('/categories/{id}','App\Http\Controllers\UserInterfaceController@categories')->name('/user/categories');
Route::get('product/class/{class_id}/category/{category_id}','App\Http\Controllers\UserInterfaceController@product')->name('/user/product');
Route::get('/singleproduct/{slug}','App\Http\Controllers\UserInterfaceController@singleproduct')->name('/product/singleproduct');

// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



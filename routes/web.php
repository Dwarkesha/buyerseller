<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\SellerController;

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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/{id}', 'App\Http\Controllers\HomeController@profile')->name('profile');
Route::post('/profile', 'App\Http\Controllers\HomeController@update');


//buyer route
Route::get('/buyerindex', 'App\Http\Controllers\BuyerController@index')->name('buyerindex');
Route::get('/productdetail/{id}', 'App\Http\Controllers\BuyerController@productDetail')->name('productdetail');
Route::get('/purchaseproduct/{id}', 'App\Http\Controllers\BuyerController@purchaseProduct')->name('purchaseproduct');
Route::get('/parchaselist', 'App\Http\Controllers\BuyerController@parchaseList')->name('parchaselist');
Route::get('/pendingparchaselist', 'App\Http\Controllers\BuyerController@pendingParchaseList')->name('pendingparchaselist');
Route::get('/buynow/{id}', 'App\Http\Controllers\BuyerController@buyNow')->name('buynow');
Route::post('changeparchasestatus', 'App\Http\Controllers\BuyerController@changeParchaseStatus')->name('changeparchasestatus');
Route::get('/buyerhistory/{id}','App\Http\Controllers\BuyerController@buyerHistory')->name('buyerhistory');
Route::post('/buyerhistoryfilter','App\Http\Controllers\BuyerController@historyFilter')->name('buyerhistoryfilter');
Route::post('/productfilter','App\Http\Controllers\BuyerController@productFilter')->name('productfilter');
Route::get('/categoryfilter','App\Http\Controllers\BuyerController@categoryFilter')->name('categoryfilter');



//---------------------seller----------------

//seller route
Route::get('/sellerindex', 'App\Http\Controllers\seller\SellerController@index')->name('sellerindex');
Route::get('/selledhistory','App\Http\Controllers\seller\SellerController@selledHistory')->name('selledhistory');
Route::get('/aceptedrequesthistory', 'App\Http\Controllers\seller\SellerController@aceptedRequestHistory')->name('aceptedrequesthistory');


// Route::get('/productlist', 'App\Http\Controllers\SellerController@productList')->name('productlist');
// Route::get('/productview/{id}', 'App\Http\Controllers\SellerController@productView')->name('productview');

// Route::get('/search','App\Http\Controllers\SellerController@search')->name('search');
// Route::get('/aceptrequest/{id}','App\Http\Controllers\SellerController@aceptRequest')->name('aceptrequest');


//product route

Route::get('/productlist', 'App\Http\Controllers\seller\ProductController@index')->name('productlist');
Route::get('/productcreate', 'App\Http\Controllers\seller\ProductController@create')->name('productcreate');
Route::post('/productcreate', 'App\Http\Controllers\seller\ProductController@store');
Route::get('/productedit/{id}', 'App\Http\Controllers\seller\ProductController@edit')->name('productedit');
Route::post('/productedit', 'App\Http\Controllers\seller\ProductController@update');
Route::get('/productdelete/{id}', 'App\Http\Controllers\seller\ProductController@destroy')->name('productdelete');


Route::get('/productview/{id}', 'App\Http\Controllers\seller\ProductController@show')->name('productview');
Route::get('/aceptrequest/{id}','App\Http\Controllers\seller\ProductController@aceptRequest')->name('aceptrequest');






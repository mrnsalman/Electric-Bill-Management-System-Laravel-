<?php

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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['superAdmin']], function ()
{
    /* User Routes */

    Route::get('/addUser', 'UserController@addUser')->name('addUser');
    Route::post('/newUser', 'UserController@newUser')->name('newUser');
    Route::get('/editUser-{id}', 'UserController@editUser')->name('editUser');
    Route::post('/updateUser', 'UserController@updateUser')->name('updateUser');
    Route::get('/deleteUser-{id}', 'UserController@deleteUser')->name('deleteUser');
    Route::get('/statusChange-{id}', 'ShopController@statusChange')->name('statusChange');
});

Route::group(['middleware' => ['superNadmin']], function ()
{
    /* User Routes */

    Route::get('/manageUser','UserController@manageUser')->name('manageUser');
    Route::get('/getUsers', 'UserController@getUsers')->name('getUsers');
    Route::get('/viewUser-{id}', 'UserController@viewUser')->name('viewUser');
    Route::post('/userSearch', 'UserController@search')->name('userSearch');

    /* Shop Routes */

    Route::get('/addShop', 'ShopController@addShop')->name('addShop');
    Route::post('/newShop', 'ShopController@newShop')->name('newShop');
    Route::get('/editShop-{id}', 'ShopController@editShop')->name('editShop');
    Route::post('/updateShop', 'ShopController@updateShop')->name('updateShop');
    Route::get('/deleteShop-{id}', 'ShopController@deleteShop')->name('deleteShop');
    Route::post('/shopUserSearch', 'ShopController@userSearch')->name('userSearch');
    Route::post('/shop_id_validation','ShopController@shop_id_validation')->name('shop_id_validation');

    /* Bill Routes */

    Route::get('/addBill-{id}','BillController@addBill')->name('addBill');
    Route::post('/newBill','BillController@newBill')->name('newBill');
    Route::get('/editBill-{id}','BillController@editBill')->name('editBill');
    Route::post('/updateBill','BillController@updateBill')->name('updateBill');
    Route::get('/deleteBill-{id}','BillController@deleteBill')->name('deleteBill');
    Route::get('/bill_list','BillController@bill_list')->name('bill_list');
    Route::post('/monthlyBill','BillController@monthlyBill')->name('monthlyBill');
    Route::get('/print_monthly_bill-{month}-{year}-{floor}','BillController@print_monthly_bill')->name('print_monthly_bill');
    Route::post('/bill_id_validation','BillController@bill_id_validation')->name('bill_id_validation');
});

/* Profile Routes */

Route::get('/viewProfile', 'UserController@viewProfile')->name('viewProfile');
Route::get('/editProfile', 'UserController@editProfile')->name('editProfile');
Route::post('/updateProfile', 'UserController@updateProfile')->name('updateProfile');
Route::get('/changePassword', 'UserController@changePassword')->name('changePassword');
Route::post('/updatePassword', 'UserController@updatePassword')->name('updatePassword');
Route::post('/username_validation','UserController@username_validation')->name('username_validation');
Route::post('/email_validation','UserController@email_validation')->name('email_validation');


/* Shop Routes Without middleware */

Route::get('/manageShop','ShopController@manageShop')->name('manageShop');
Route::get('/getShops', 'ShopController@getShops')->name('getShops');
Route::get('/viewShop-{id}', 'ShopController@viewShop')->name('viewShop');
Route::post('/shopSearch', 'ShopController@search')->name('shopSearch');

/* Bill Routes */

Route::get('/manageBill-{id}','BillController@manageBill')->name('manageBill');
Route::get('/viewBill-{id}','BillController@viewBill')->name('viewBill');
Route::post('/billSearch', 'BillController@search')->name('billSearch');
Route::get('/invoiceBill-{id}','BillController@invoiceBill')->name('invoiceBill');


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

Route::get('/', "WarrantyCardController@index");
Route::get('/', "WarrantyCardController@index")->name("index")->middleware("ktradangnhap");


Route::get('/xuly_addnew_warcard', "WarrantyCardController@xuly_addnew_warcard")
->name("xuly_addnew_warcard");


Route::get('/xuly_send_form', "WarrantyCardController@xuly_send_form")
->name("xuly_send_form");

Route::get('/xuly_getback_form', "WarrantyCardController@xuly_getback_form")
->name("xuly_getback_form");

Route::get('/xuly_turn_form', "WarrantyCardController@xuly_turn_form")
->name("xuly_turn_form");

Route::get('/get_supplier', "WarrantyCardController@get_supplier")
->name("get_supplier");

Route::get('/get_customer', "WarrantyCardController@get_customer")
->name("get_customer");

Route::get('/login', function () {
    return view("login");
})->name('login');

Route::post('/checklogin', "UserController@checkLogin")
->name('login_post');

Route::get('/logout', "UserController@logout")
->name('logout');


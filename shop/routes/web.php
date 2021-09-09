<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
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
Route::get('index',[PageController::class,'getIndex']);
Route::get('loai_san_pham/{type}',[PageController::class,'getLoaiSp']);
Route::get('chi_tiet_san_pham/{id}',[PageController::class,'getChitiet']);
Route::get('gioi_thieu',[PageController::class,'getGioiThieu']);
//Giỏ Hàng
Route::get('/Add_Cart/{id}',[PageController::class,'AddCart']);
Route::get('/Delete_Item_Cart/{id}',[PageController::class,'DeleteItemCart']);
Route::get('/list_cart',[PageController::class,'List']);
Route::get('/Delete_List_Cart/{id}',[PageController::class,'DeleteListCart']);
Route::get('/Save_List_Cart/{id}/{quanty}',[PageController::class,'SaveListCart']);
//CheckOut
Route::get('dat_hang',[PageController::class,'getCheckout']);
Route::post('dat_hang2',[PageController::class,'postCheckout'])->name('DatHang');
//Mail
Route::get('lien_he',[ContactController::class,'contact']);
Route::post('send_message',[ContactController::class,'sendEmail'])->name('contact.send');



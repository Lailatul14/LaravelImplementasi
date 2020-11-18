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


Route::get('implementasideploy', function () {
    return view('tampilan/index');
});
//Route::get('/','indexController@index');
Route::get('body', function () {
    return view('tampilan/body');
});


Route::get('header', function () {
    return view('tampilan/header');
});

Route::get('footer', function () {
    return view('tampilan/footer');
});

Route::get('sidebar', function () {
    return view('tampilan/sidebar');
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('customerCreate1','customerController@create');
Route::get('customerIndex','customerController@index');
Route::get('customerCreate1/getstates{id}','customerController@getStates');
Route::get('customerCreate1/kecamatan{id}','customerController@kecamatan');
Route::get('customerCreate1/kelurahan{id}','customerController@kelurahan');
Route::get('customerStore1', 'customerController@store');
Route::get('customerDestroy{id}', 'customerController@destroy');


Route::get('customerCreate2','customerController@create2');
Route::get('customer/create2/getstates/{id}','customerController@getStates2');
Route::get('customer/create2/kecamatan/{id}','customerController@kecamatan2');
Route::get('customer/create2/kelurahan/{id}','customerController@kelurahan2');
Route::get('customerStore2', 'customerController@store2');


Route::get('barcodebarcode','barcodeController@barcode');
Route::get('barcodebarcode_pdf', 'barcodeController@printBarcode');
Route::get('barcodebarcode_scanner','barcodeController@scannerBarcode');
Route::get('/barang/alert/{id}','barcodeController@alert');
Route::get('barcodeStore','barcodeController@store');
Route::get('printBarcode_id/{id}','barcodeController@printBarcodeId');
//Route::get('indexBarang','barcodeController@index');


Route::get('/cetakBarcode','locationController@cetak');
Route::get('/cetakBarcode_id/{id}','locationController@cetakBarcodeId');

Route::get('/location','locationController@index');
Route::get('/inputTitikAwal','locationController@titikAwal');
Route::get('/titikKunjungan','locationController@titikKunjungan');
Route::post('/LocationStore','locationController@store');
Route::get('/lokasi/alert/{id}','locationController@alert');
Route::get('Toko/req-nama-toko/{id}','locationController@getNamaToko');

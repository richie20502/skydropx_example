<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkydropxController;
use App\Http\Controllers\EnviaController;
use App\Http\Controllers\Evia2Controller;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/shipment-form', function () {
    return view('shipment/shipment-form');
})->name('shipment-form');

Route::post('/generate-shipment', [SkydropxController::class, 'generateShipment'])->name('generate.shipment');


Route::get('/quotation-form', function () {
    return view('quotation/quotation-form');
})->name('quotation-form');

Route::post('/quotations', [SkydropxController::class, 'getQuotation'])->name('get.quotation');




Route::get('shipments/form', [EnviaController::class, 'showForm'])->name('shipments.form');
Route::post('shipments', [EnviaController::class, 'createShipment'])->name('shipments.create');


Route::get('/envia-request', [EnviaController::class, 'showRequestForm']);
Route::post('/enviar-cotizacion', [EnviaController::class, 'sendRequest']);



Route::get('/envio_envia', [EnviaController::class, 'showFrom2']);
Route::post('/api/shipments', [EnviaController::class, 'createShipment2']);




Route::get('/shipments/create', [Evia2Controller::class, 'index'])->name('shipments.create');
Route::post('/shipments', [Evia2Controller::class, 'createShipment'])->name('shipments.store');
Route::post('/shipments/track', [Evia2Controller::class, 'trackShipment'])->name('shipments.track');
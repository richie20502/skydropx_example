<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkydropxController;

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
});


Route::get('/quotation-form', function () {
    return view('quotation-form');
});

Route::post('/quotations', [SkydropxController::class, 'getQuotation'])->name('get.quotation');
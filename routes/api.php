<?php

use App\Http\Controllers\PriceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/prices', [PriceController::class, 'index']);

Route::get('/products/{product_id}/prices', [PriceController::class, 'show'])
    ->whereUuid('product_id');

Route::put('/prices/{product_id}', [PriceController::class, 'update'])
    ->whereUuid('product_id');

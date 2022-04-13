<?php

use App\Http\Controllers\BookServiceController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\OnRoadPriceController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PopUpController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//popup
Route::post('popup', [PopUpController::class, 'store']);

//enquiry
Route::post('enquiry', [EnquiryController::class, 'store']);

//On Road Price
Route::post('on-road-price', [OnRoadPriceController::class, 'store']);

//insurance
Route::post('insurance', [InsuranceController::class, 'store']);

//finance
Route::post('finance', [FinanceController::class, 'store']);

//Book A Service
Route::post('book-a-service', [BookServiceController::class, 'store']);

//Contact Us
Route::post('contact-us', [ContactUsController::class, 'store']);

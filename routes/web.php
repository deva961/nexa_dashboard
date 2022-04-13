<?php

use App\Http\Controllers\BookServiceController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\OnRoadPriceController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PopUpController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {

    //Notifications mark as read
    Route::get('/markAsRead', function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markAsRead');

    //dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // popup
    Route::get('popup', [PopUpController::class, 'index'])->name('popup.index');
    Route::post('popup', [PopupController::class, 'getDate'])->name('popup.getdate');

    // Enquiry
    Route::get('enquiry', [EnquiryController::class, 'index'])->name('enquiry.index');
    Route::post('enquiry', [EnquiryController::class, 'getDate'])->name('enquiry.getdate');

    //on road price
    Route::get('on-road-price', [OnRoadPriceController::class, 'index'])->name('on-road-price.index');
    Route::post('on-road-price', [OnRoadPriceController::class, 'getDate'])->name('onroadprice.getdate');

    //Insurance
    Route::get('insurance', [InsuranceController::class, 'index'])->name('insurance.index');
    Route::post('insurance', [InsuranceController::class, 'getDate'])->name('insurance.getdate');

    //Finance
    Route::get('finance', [FinanceController::class, 'index'])->name('finance.index');
    Route::post('finance', [FinanceController::class, 'getDate'])->name('finance.getdate');

    //Book A Service
    Route::get('book-a-service', [BookServiceController::class, 'index'])->name('book-a-service.index');
    Route::post('book-a-service', [BookServiceController::class, 'getDate'])->name('book-a-service.getdate');


    //contact us
    Route::get('contact-us', [ContactUsController::class, 'index'])->name('contact-us.index');
    Route::post('contact-us', [ContactUsController::class, 'getDate'])->name('contact-us.getdate');
});

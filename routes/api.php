<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductImageController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\PartnershipController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\ShowcaseController;
use App\Http\Controllers\Api\SocialMediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    // products
    Route::resource('products', ProductController::class);
    Route::post('product-images', [ProductImageController::class, 'storeMultiple']);
    Route::get('product-images', [ProductImageController::class, 'index']);
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/count', [OrderController::class, 'count']);
    Route::get('orders/{id}', [OrderController::class, 'show']);
    Route::put('orders/{id}/status', [OrderController::class, 'updateStatus']);
    Route::get('contacts', [ContactController::class, 'index']);
    Route::delete('product-images/{id}', [ProductImageController::class, 'destroy']);
    Route::resource('categories', CategoryController::class);
    Route::put('categories/order', [CategoryController::class, 'updateOrder']);
    Route::resource('sliders', SliderController::class);
    Route::resource('media', MediaController::class);
    Route::post('media/delete', [MediaController::class, 'destroyMultiple']);
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('partnerships', PartnershipController::class);
    Route::resource('social-media', SocialMediaController::class);
    Route::resource('pages', PageController::class);
    Route::get('pages/slug/{slug}', [PageController::class, 'showBySlug']);

    // verifyReseller, tapi endpoint kata benda
    Route::put('users/{id}/reseller-verified', [UserController::class, 'verifyReseller']);

    // verifyAffiliator
    Route::post('users/{id}/affiliator', [UserController::class, 'verifyAffiliator']);

    Route::post('settings', [SettingController::class, 'store']);
    Route::get('settings', [SettingController::class, 'index']);

    // Showcase Routes
    Route::apiResource('showcases', ShowcaseController::class);
    Route::apiResource('sections', SectionController::class);
});

// login ke AuthController@login, pakai sanctum
Route::post('login', [AuthController::class, 'login']);

// logout ke AuthController@logout, pakai sanctum
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

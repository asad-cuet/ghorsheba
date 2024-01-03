<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Auth\AuthCenterController;
use App\Http\Controllers\Api\V1\Auth\PasswordAuthController;


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

Route::get('/user', [App\Http\Controllers\Api\V1\AuthController::class, 'me'])->middleware('auth:sanctum');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Signup
Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => '/auth'], function () {

        Route::controller(AuthCenterController::class)->group(function () {
            Route::middleware('auth:sanctum')->group(function () {
                Route::get('/user','authUser');
                Route::get('/signout','signOut');
            });
        });

        Route::controller(PasswordAuthController::class)->group(function () {
            Route::post('/password-signup', 'signUp')->middleware(['auth:sanctum','authadmin']);
            Route::post('/password-signin', 'signIn');
        });


    });

    Route::apiResource('/users', App\Http\Controllers\Api\V1\UserController::class);


    Route::apiResource('users', 'App\Http\Controllers\Api\V1\UserController')->only(['index']);
    Route::apiResource('service-categories', 'App\Http\Controllers\Api\V1\ServiceCategoryController')->only(['index','store']);
    Route::apiResource('service-providers', 'App\Http\Controllers\Api\V1\ServiceProviderController');
    Route::apiResource('contacts', 'App\Http\Controllers\Api\V1\ContactController')->only(['index']);
    Route::apiResource('orders', 'App\Http\Controllers\Api\V1\OrderController');
    Route::apiResource('profiles', 'App\Http\Controllers\Api\V1\ProfileController');

});





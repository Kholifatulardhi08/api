<?php

use App\Http\Controllers\approvalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\RoomApiController;
use App\Http\Controllers\UnitApiController;
use App\Http\Controllers\MealApiController;
use App\Http\Controllers\DrinkApiController;
use App\Http\Controllers\BookingApiController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\PantryApiController;

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

//Route Middleware
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    //Route Middleware
    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user', [AuthController::class, 'userProfile']);

        //API DELETE RESOURECE
        Route::post('/delete', [deleteController::class, 'delete']);
        //Route::post('/deleteBooking/{id}', [deleteController::class, 'deleteBooking']);


        //API USER
        Route::get('/users', [UserApiController::class, 'index']);
        Route::post('/users/approve', [UserApiController::class, 'approve']);
        Route::put('/users/{id}', [UserApiController::class, 'update']);
        Route::get('users/search/{query}', [UserApiController::class, 'search']);
        Route::get('users/{id}', [UserApiController::class, 'username']);

        //API ROOM
        Route::get('/rooms', [RoomApiController::class, 'index']);
        Route::post('/rooms', [RoomApiController::class, 'store']);
        Route::put('/rooms/{id}', [RoomApiController::class, 'update']);
        Route::get('rooms/search/{query}', [RoomApiController::class, 'search']);

        // API UNIT
        Route::get('/units', [UnitApiController::class, 'index']);
        Route::post('/units', [UnitApiController::class, 'store']);
        Route::put('/units/{id}', [UnitApiController::class, 'update']);
        Route::get('units/search/{query}', [UnitApiController::class, 'search']);

        // API MEAL
        Route::get('/meals', [MealApiController::class, 'index']);
        Route::post('/meals', [MealApiController::class, 'store']);
        Route::put('/meals/{id}', [MealApiController::class, 'update']);
        Route::get('meals/search/{query}', [MealApiController::class, 'search']);


        // API DRINK
        Route::get('/drinks', [DrinkApiController::class, 'index']);
        Route::post('/drinks', [DrinkApiController::class, 'store']);
        Route::put('/drinks/{id}', [DrinkApiController::class, 'update']);
        Route::get('drinks/search/{query}', [DrinkApiController::class, 'search']);


        // API BOOKING
        Route::get('/bookings', [BookingApiController::class, 'index']);
        Route::post('/bookings', [BookingApiController::class, 'store']);
        Route::put('/bookings/{id}', [BookingApiController::class, 'update']);
        Route::get('bookings/search/{query}', [BookingApiController::class, 'search']);
    });
});

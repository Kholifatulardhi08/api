<?php

use App\Http\Controllers\approvalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\RoomApiController;
use App\Http\Controllers\UnitApiController;
use App\Http\Controllers\MealApiController;
use App\Http\Controllers\DrinkApiController;
use App\Http\Controllers\BookingApiController;
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


        //API APPROVE USER
        Route::post('/approve', [approvalController::class, 'approve']);

        //API USER
        Route::get('/users', [UserApiController::class, 'index']);
        Route::post('/users', [UserApiController::class, 'store']);
        Route::get('/users/{id}', [UserApiController::class, 'show']);
        Route::put('/users/{id}', [UserApiController::class, 'update']);
        Route::delete('/users/{id}', [UserApiController::class, 'destroy']);
        Route::get('users/search/{name}', [UserApiController::class, 'search']);

        //API ROOM
        Route::get('/rooms', [RoomApiController::class, 'index']);
        Route::post('/rooms', [RoomApiController::class, 'store']);
        Route::get('/rooms/{id}', [RoomApiController::class, 'show']);
        Route::put('/rooms/{id}', [RoomApiController::class, 'update']);
        Route::delete('/rooms/{id}', [RoomApiController::class, 'destroy']);
        Route::get('rooms/search/{name}', [RoomApiController::class, 'search']);

        // API UNIT
        Route::get('/units', [UnitApiController::class, 'index']);
        Route::post('/units', [UnitApiController::class, 'store']);
        Route::get('/units/{id}', [UnitApiController::class, 'show']);
        Route::put('/units/{id}', [UnitApiController::class, 'update']);
        Route::delete('/units/{id}', [UnitApiController::class, 'destroy']);
        Route::get('units/search/{name}', [UnitApiController::class, 'search']);

        // API MEAL
        Route::get('/meals', [MealApiController::class, 'index']);
        Route::post('/meals', [MealApiController::class, 'store']);
        Route::get('/meals/{id}', [MealApiController::class, 'show']);
        Route::put('/meals/{id}', [MealApiController::class, 'update']);
        Route::delete('/meals/{id}', [MealApiController::class, 'destroy']);
        Route::get('meals/search/{name}', [MealApiController::class, 'search']);


        // API DRINK
        Route::get('/drinks', [DrinkApiController::class, 'index']);
        Route::post('/drinks', [DrinkApiController::class, 'store']);
        Route::get('/drinks/{id}', [DrinkApiController::class, 'show']);
        Route::put('/drinks/{id}', [DrinkApiController::class, 'update']);
        Route::delete('/drinks/{id}', [DrinkApiController::class, 'destroy']);
        Route::get('drinks/search/{name}', [DrinkApiController::class, 'search']);


        // API BOOKING
        Route::get('/bookings', [BookingApiController::class, 'index']);
        Route::post('/bookings', [BookingApiController::class, 'store']);
        Route::get('/bookings/{id}', [BookingApiController::class, 'show']);
        Route::put('/bookings/{id}', [BookingApiController::class, 'update']);
        Route::delete('/bookings/{id}', [BookingApiController::class, 'destroy']);

        //API PANTRY
        Route::get('/pantries', [BookingApiController::class, 'index']);
        Route::post('/pantries', [BookingApiController::class, 'store']);
        Route::get('/pantries/{id}', [BookingApiController::class, 'show']);
        Route::put('/pantries/{id}', [BookingApiController::class, 'update']);
        Route::delete('/pantries/{id}', [BookingApiController::class, 'destroy']);

    });
});

<?php

use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\LoginController;
use Illuminate\Support\Facades\Route;
use Mashfiqdev\CouponManager\Http\Controllers\CouponManagerController;

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

Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:api')->group( function () {

    Route::resource('courses', CourseController::class)->except([
        'create', 'edit'
    ]);
    Route::resource('departments', DepartmentController::class)->except([
        'create', 'edit'
    ]);
    Route::resource('coupons', CouponManagerController::class)->except([
        'create', 'edit'
    ]);
});
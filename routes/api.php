<?php

use App\Http\Controllers\Api\SmsCodesController;
use App\Http\Controllers\Api\UsersController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// 短信验证码
Route::post('smsCodes', [SmsCodesController::class, 'store']);
// 用户注册
Route::post('users/signup', [UsersController::class, 'signup']);
// 用户登录
Route::post('users/login', [UsersController::class, 'login']);
// 某个用户信息
Route::get('users/{user}', [UsersController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    // 当前用户信息
    Route::get('user', [UsersController::class, 'me']);
});

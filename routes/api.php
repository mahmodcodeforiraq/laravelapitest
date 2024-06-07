<?php

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
Route::post('user/register','App\Http\Controllers\APIRegisterController@register');

Route::post('user/login','App\Http\Controllers\APILoginController@login');

Route::middleware('jwt.auth')->get('/users', function (Request $request) {
    return auth()->user();
});
Route::middleware('jwt.auth')->group( function(){
    Route::resource('/books','App\Http\Controllers\API\BookController');
});
Route::get('/run-migrations', function () {
    Artisan::call('migrate', ["--force" => true]);
    return 'تم تنفيذ الأوامر بنجاح';
});

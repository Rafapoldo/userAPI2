<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use GuzzleHttp\Promise\Create;
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
Route::get('/products', function () {
    return "rafalindo";
});
Route::get('/users',  [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']); 
Route::post('/users/{id}', [UserController::class, 'show']); 
Route::put('/users/{id}', [UserController::class, 'update']); 
Route::delete('/users/{id}', [UserController::class, 'destroy']); 

// Route::post('/createuser', function(){
//     return User::create([
//         'name' => 'Rafael Leopoldo',
//         'email' => 'rafa@lindo.com',
//         'password' => md5('rafalindo123')
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
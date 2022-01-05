<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ConsumedIngController;
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
//Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//ingredient
Route::post('/save_ingredient', [IngredientController::class, 'create']);
Route::get('/ingredient', [IngredientController::class, 'index']);
//user id
Route::get('/ingredient/{id}', [IngredientController::class, 'show']);
//ingredient id
Route::post('/check_expired/{ing_id}/{id}', [IngredientController::class, 'checkExpired']);
Route::delete('/ingredientDelete/{id}', [IngredientController::class, 'delete']);
//consumed ingredient
Route::post('/consumed_ingredient', [ConsumedIngController::class, 'create']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

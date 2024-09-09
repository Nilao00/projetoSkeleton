<?php

use App\Http\Controllers\AdressController;
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
Route::get('teste', function () {
    return response()->json(['teste' => 'teste']);
});
//adresses
Route::post('adresses', [AdressController::class, 'create']);
Route::get('adresses/{id}', [AdressController::class, 'find']);
Route::get('adresses/{id}', [AdressController::class, 'findById']);
Route::put('adresses/{id}', [AdressController::class, 'update']);
Route::delete('adresses/{id}', [AdressController::class, 'delete']);

//companies
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'create']);
Route::get('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'find']);
Route::get('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'findById']);
Route::put('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'update']);
Route::delete('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'delete']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController; // Import CompanyController
use App\Http\Controllers\EmployeeController; // Import EmployeeController
use App\Http\Controllers\SearchController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/user', [AuthController::class, 'getUser']); // Example endpoint

// CRUD APIs for companies and employees
Route::apiResource('companies', CompanyController::class);
Route::apiResource('employees', EmployeeController::class);
Route::get('/search', [SearchController::class, 'index']);



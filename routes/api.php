<?php

use App\Http\Controllers\StatusController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/tasks', [TasksController::class, 'index']);
Route::get('/tasks/{id}', [TasksController::class, 'show']);
Route::get('/types', [TypesController::class, 'index']);
Route::get('/status', [StatusController::class, 'index']);
Route::get('/users', [UsersController::class, 'index']);
Route::middleware("cors")->post('/createtask', [TasksController::class, 'store']);

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/v1')->group(function () {
//    Create a task
    Route::post('/create', [\App\Http\Controllers\API\Version_1\TodoController::class, 'create']);
//    Complete a task
    Route::get('/completed/{todo}', [\App\Http\Controllers\API\Version_1\TodoController::class, 'completed']);
//    Delete a task
    Route::delete('/delete/{todo}', [\App\Http\Controllers\API\Version_1\TodoController::class, 'delete']);
//    todos
    Route::get('/todos/{status?}', [\App\Http\Controllers\API\Version_1\TodoController::class, 'todos']);
//    clear completed
    Route::delete('/clear-completed-tasks', [\App\Http\Controllers\API\Version_1\TodoController::class, 'clearCompletedTasks']);
});

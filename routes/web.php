<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\taskcontroller;
use App\Http\Controllers\ProfileController;
use App\Models\project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::resource("/projects",ProjectController::class)->middleware("auth");
Route::patch("/projects/{project}/tasks/{task}",[taskcontroller::class,"update"]);
Route::delete("/projects/{project}/tasks/{task}",[taskcontroller::class,"destroy"]);
Route::get("/profile",[ProfileController::class,"index"])->middleware("auth");
Route::patch("/Profile",[ProfileController::class,"update"]);
Route::post("/projects/{project}/tasks/",[taskcontroller::class,"store"]);

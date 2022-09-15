<?php

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

Route::controller(DiaryController::class)
    ->prefix('diaries')
    ->as('diaries.')
    ->middleware('auth')
    ->group(function () {
        Route::get("/", "index")->name('index');
        Route::post("/", "store")->name('store');
        Route::get("/{date}", "show")->name('show')->where("date", config("route_regex.date"));
        Route::patch("/{date}", "update")->name('update')->where("date", config("route_regex.date"));
        Route::delete("/{date}", "destroy")->name('destroy')->where("date", config("route_regex.date"));
    });
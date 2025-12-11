<?php

use App\Http\Controllers\Api\EpisodeController;
use App\Http\Controllers\Api\SeasonController;
use App\Http\Controllers\Api\SeriesController;
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

Route::apiResource('/series', SeriesController::class);
Route::post('/series/upload-cover', [SeriesController::class, 'uploadCover']);
Route::get('/series/{series}/seasons', [SeasonController::class, 'index']);

Route::get('/series/{series}/episodes', [EpisodeController::class, 'index']);
Route::patch('/episodes/{episode}', [EpisodeController::class, 'watched']);

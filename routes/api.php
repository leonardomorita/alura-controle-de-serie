<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EpisodeController;
use App\Http\Controllers\Api\LoginController;
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

Route::post('/login', [LoginController::class, 'login'])->name('api.login');

// JWT Auth routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('/series', SeriesController::class)->names('api.series');
    Route::post('/series/upload-cover', [SeriesController::class, 'uploadCover']);
    Route::get('/series/{series}/seasons', [SeasonController::class, 'index'])->name('api.series.seasons.index');

    Route::get('/series/{series}/episodes', [EpisodeController::class, 'index'])->name('api.series.all.episodes');
    Route::patch('/episodes/{episode}', [EpisodeController::class, 'watched']);
});

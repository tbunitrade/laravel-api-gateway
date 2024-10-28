<?php
declare(strict_types=1);

use app\Http\Controllers\V1\BookEventController;
use app\Http\Controllers\V1\EventItemController;
use app\Http\Controllers\V1\ShowController;
use app\Http\Controllers\V1\ShowItemController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {
   Route::get('/shows', ShowController::class);
   Route::get('/shows/{id}/events', ShowItemController::class)
       ->where('id','\d+');
   Route::get('events/{id/places}', EventItemController::class)
       ->where('id','\d+');
   Route::post('/events/{id}/reserve', BookEventController::class)
       ->where('id','\d+');
});

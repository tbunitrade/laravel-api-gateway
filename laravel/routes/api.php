<?php
declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

use App\Middleware\IncreaseExecutionTime;


//Route::prefix('v1')
//    ->middleware([IncreaseExecutionTime::class])
//    ->group(function () {
//        Route::get('/shows', \app\Http\Controllers\V1\ShowController::class);
//    });

Route::prefix('v1')->group(function () {
   Route::get('/shows', \app\Http\Controllers\V1\ShowController::class);
});

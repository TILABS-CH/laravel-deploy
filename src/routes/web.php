<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Tilabs\LaravelDeploy\Controllers\OptimizationController;

Route::name('tilabs.')->prefix('tilabs')->group(function () {
    Route::get('optimize', OptimizationController::class)->name('optimize');
});

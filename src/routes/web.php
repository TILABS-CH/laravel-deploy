<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Tilabs\LaravelDeploy\Controllers\OptimizationController;
use Tilabs\LaravelDeploy\Controllers\StorageLinkController;

Route::name('tilabs.')->prefix('tilabs')->group(function () {
    Route::get('optimize', OptimizationController::class)->name('optimize');

    Route::get('storage-link', StorageLinkController::class)->name('storage-link');
});

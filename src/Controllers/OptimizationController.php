<?php

declare(strict_types=1);

namespace Tilabs\LaravelDeploy\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class OptimizationController
{
    public function __invoke(Request $request): string
    {
        abort_unless($request->input('key') === config('deployment.key'), 403);

        Artisan::call('optimize:clear');
        Artisan::call('cache:clear');

        Artisan::call('optimize');

        return 'Application optimized successfully';
    }
}

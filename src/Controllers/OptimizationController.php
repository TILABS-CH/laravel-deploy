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

        Artisan::call('route:clear');

        Artisan::call('config:clear');

        Artisan::call('cache:clear');

        Artisan::call('event:clear');

        Artisan::call('view:clear');

        Artisan::call('route:cache');

        Artisan::call('config:cache');

        Artisan::call('event:cache');

        Artisan::call('view:cache');

        return 'Application optimized successfully';
    }
}

<?php

declare(strict_types=1);

namespace Tilabs\LaravelDeploy\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class IconOptimizerController
{
    public function __invoke(Request $request): string
    {
        abort_unless($request->input('key') === config('deployment.key'), 403);

        Artisan::call('icons:clear');

        Artisan::call('icons:cache');

        return 'Icons optimized successfully';
    }
}

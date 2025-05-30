<?php

declare(strict_types=1);

namespace Tilabs\LaravelDeploy\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SiteOptimizeIconsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:optimize-icons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimize the application icons provided by driesvints/blade-icons by clearing and caching them.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $response = Http::get(route('tilabs.optimize.icons'), [
            'key' => config('deployment.key'),
        ])->throwUnlessStatus(200);

        $this->info($response->body());
    }
}

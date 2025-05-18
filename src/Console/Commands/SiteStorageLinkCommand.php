<?php

declare(strict_types=1);

namespace Tilabs\LaravelDeploy\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SiteStorageLinkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:storage-link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Links the storage directory to the public directory for the site.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $response = Http::get(route('tilabs.storage-link'), [
            'key' => config('deployment.key'),
        ])->throwUnlessStatus(200);

        $this->info($response->body());
    }
}

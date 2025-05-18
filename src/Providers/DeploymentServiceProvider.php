<?php

declare(strict_types=1);

namespace Tilabs\LaravelDeploy\Providers;

use Illuminate\Support\ServiceProvider;
use Tilabs\LaravelDeploy\Console\Commands\SiteOptimizeCommand;

final class DeploymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/deployment.php', 'deployment'
        );
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/deployment.php' => config_path('deployment.php'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->commands([
                SiteOptimizeCommand::class,
            ]);
        }
    }
}

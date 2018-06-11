<?php

namespace App\Providers;

use App\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        view()->composer('*', GlobalComposer::class);
    }
}

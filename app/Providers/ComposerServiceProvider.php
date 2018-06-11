<?php

namespace App\Providers;

use App\Composers\{AdminConcernComposer, GlobalComposer};
use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App\Providers
 */
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
        view()->composer('concerns.admin.index', AdminConcernComposer::class);
    }
}

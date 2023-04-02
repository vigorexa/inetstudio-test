<?php

namespace Vigorexa\InetstudioTest\Architecture\Third\Providers;

use Closure;
use Illuminate\Support\ServiceProvider;
use Vigorexa\InetstudioTest\Architecture\Third\Abstracts\KeyStorageContract;
use Vigorexa\InetstudioTest\Architecture\Third\KeyStorage;

class KeyStorageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . "/../Config/config.php", 'key-storage');
        $this->app->singleton(KeyStorageContract::class, fn () => new KeyStorage());
    }
}
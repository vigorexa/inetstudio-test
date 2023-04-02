<?php

namespace Vigorexa\InetstudioTest\Tests;


use Vigorexa\InetstudioTest\Architecture\Third\Abstracts\KeyStorageFacade;
use Vigorexa\InetstudioTest\Architecture\Third\Providers\KeyStorageServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../src/Database/migrations');
    }

    protected function getPackageProviders($app)
    {
        return [KeyStorageServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['KeyStorageFacade' => KeyStorageFacade::class];
    }
}
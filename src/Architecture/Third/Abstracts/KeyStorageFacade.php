<?php

namespace Vigorexa\InetstudioTest\Architecture\Third\Abstracts;

use Illuminate\Support\Facades\Facade;

class KeyStorageFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return KeyStorageContract::class;
    }
}
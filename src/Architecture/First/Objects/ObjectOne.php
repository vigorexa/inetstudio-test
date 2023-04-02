<?php

namespace Vigorexa\InetstudioTest\Architecture\First\Objects;

use Vigorexa\InetstudioTest\Architecture\First\Abstracts\BaseObject;

class ObjectOne extends BaseObject
{
    public function handleObject(): string
    {
        return "$this->name -- handler ObjectOne";
    }
}
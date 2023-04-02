<?php

namespace Vigorexa\InetstudioTest\Architecture\First\Abstracts;

abstract class BaseObject
{
    abstract public function handleObject(): string;

    public function __construct(
        protected string $name
    ){}
}
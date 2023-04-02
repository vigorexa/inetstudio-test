<?php

namespace Vigorexa\InetstudioTest\Architecture\Third\Abstracts;


abstract class BaseKeyStorage
{
    protected int $user;
    protected string $key;

    abstract public function storeKey(int $user, string $key): bool;
    abstract public function getKey(int $user): ?string;

    public function __construct(
        private array $config,
    ){}
}
<?php

namespace Vigorexa\InetstudioTest\Architecture\Third;

use Mockery\Exception;
use Vigorexa\InetstudioTest\Architecture\Third\Abstracts\BaseKeyStorage;
use Vigorexa\InetstudioTest\Architecture\Third\Abstracts\KeyStorageContract;

class KeyStorage implements KeyStorageContract
{
    private BaseKeyStorage $selectedStorage;

    public function __construct() {
        /** @var array{class: string, config: array}|null $selectedStorage */
        $selectedStorage = data_get(config('key-storage.storages'), config('key-storage.default-storage'));
        if ($selectedStorage === null) {
            throw new Exception('Invalid storage selected');
        }

        $this->selectedStorage = new ($selectedStorage['class'])($selectedStorage['config']);
    }


    public function storeKey(int $user, string $key): bool
    {
        return $this->selectedStorage->storeKey($user, $key);
    }

    public function getKey(int $user)
    {
        return $this->selectedStorage->getKey($user);
    }
}
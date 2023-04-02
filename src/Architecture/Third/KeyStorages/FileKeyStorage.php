<?php

namespace Vigorexa\InetstudioTest\Architecture\Third\KeyStorages;

use Vigorexa\InetstudioTest\Architecture\Third\Abstracts\BaseKeyStorage;

class FileKeyStorage extends BaseKeyStorage
{
    public function storeKey(int $user, string $key): bool
    {
        $this->user = $user;
        $this->key = $key;

        return true;
    }

    public function getKey(int $user): ?string
    {
        return $this->user === $user ? $this->key : null;
    }
}
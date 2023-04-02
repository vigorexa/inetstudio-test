<?php

namespace Vigorexa\InetstudioTest\Architecture\First;

use Vigorexa\InetstudioTest\Architecture\First\Abstracts\BaseObject;

class ObjectHandler
{
    /**
     * @param BaseObject[] $objects
     * @return string[]
     */
    public function handleObjects(array $objects): array
    {
        return collect($objects)
            ->map(fn (BaseObject $object) => $object->handleObject())
            ->all();
    }
}
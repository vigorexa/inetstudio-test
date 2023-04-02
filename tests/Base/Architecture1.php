<?php

namespace Vigorexa\InetstudioTest\Tests\Base;

use Vigorexa\InetstudioTest\Architecture\First\ObjectHandler;
use Vigorexa\InetstudioTest\Architecture\First\Objects\ObjectOne;
use Vigorexa\InetstudioTest\Architecture\First\Objects\ObjectTwo;
use Vigorexa\InetstudioTest\Tests\TestCase;

/**
 * Даны 2 класса. Один реализует поведение объектов, второй - сам объект. Привести функцию handleObjects в соответствие с принципом открытости-закрытости (O: Open-Closed Principle) SOLID.
 */
class Architecture1 extends TestCase
{
    /**
     * @see \Vigorexa\InetstudioTest\Architecture\First\Abstracts
     */
    public function test_done()
    {
        $objects = [new ObjectOne('some name'), new ObjectTwo('some name')];
        $handleResult = (new ObjectHandler())->handleObjects($objects);

        dd($handleResult);
    }
}
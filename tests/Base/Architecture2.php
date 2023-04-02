<?php

namespace Vigorexa\InetstudioTest\Tests\Base;


/**
 * Устранить нарушения первого пункта принципа инверсии зависимостей (D: Dependency Inversion Principle) SOLID: « 1. Модули верхних уровней не должны зависеть от модулей нижних уровней. Оба типа модулей должны зависеть от абстракций. »
 */
class Architecture2 extends \Vigorexa\InetstudioTest\Tests\TestCase
{
    /**
     * Ну окей, там достаточно в конструкторе изменить тип
     * @see \Vigorexa\InetstudioTest\Architecture\Second\Http
     */
}
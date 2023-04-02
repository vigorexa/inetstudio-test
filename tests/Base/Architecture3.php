<?php

namespace Vigorexa\InetstudioTest\Tests\Base;

/**
 * Имеется метод getUserData, который получает данные из внешнего API, передавая в запрос необходимые парамерты, вместе с ключом (token) идентификации.
 *
 * Необходимо реализовать универсальное решение getSecretKey(), с использованием какого-либо шаблона (pattern) проектирования для хранения этого ключа всевозможными способами:
 * in file, in DB, in server memоry (redis as example), in cloud, etc.
 *
 * Достаточно реализовать простое решение, которое бы позволяло через параметр (в условной "глобальной конфигурации" / внутри класса данного метода), выбирать любой существующий способ хранения. Перечисленные способы хранения служат лишь примерами для глобального восприятия задачи и не обязательны к реализации, можно ограничиться заглушками.
 */
class Architecture3 extends \Vigorexa\InetstudioTest\Tests\TestCase
{
    protected function defineEnvironment($app)
    {
        $app['config']->set('key-storage.default-storage', 'database');
    }

    /**
     * @see \Vigorexa\InetstudioTest\Architecture\Third\KeyStorage
     */
    public function test_done()
    {
        $user = 1;
        $token = 'some secret token';

        $storeResult = \KeyStorageFacade::storeKey($user, $token);
        $savedToken = \KeyStorageFacade::getKey($user);

        dd($savedToken);
    }
}
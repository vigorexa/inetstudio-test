<?php

namespace Vigorexa\InetstudioTest\Tests\Base;

use Vigorexa\InetstudioTest\Models\Good;
use Vigorexa\InetstudioTest\Tests\TestCase;

class BaseTest extends TestCase
{
    private array $testArray = [
        ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
        ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
        ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
        ['id' => 1, 'date' => "22.01.2020", 'name' => "test1"],
        ['id' => 2, 'date' => "11.11.2020", 'name' => "test4"],
        ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
    ];

    /**
     * Выделить уникальные записи (убрать дубли) в отдельный массив. в конечном массиве не должно быть элементов с одинаковым id.
     * @return void
     */
    public function test_1()
    {
        $uniqueValues = collect($this->testArray)->unique('id')->values()->all();

        $this->assertCount(count(array_unique(array_column($this->testArray, 'id'))), $uniqueValues);

//        dd($uniqueValues);
    }

    /**
     * Отсортировать многомерный массив по ключу (любому)
     * @return void
     */
    public function test_2()
    {
        $sorted = collect($this->testArray)->sortBy('id')->values()->all();

        $this->assertTrue(call_user_func(function () use ($sorted) {
            for ($i = 1; $i < count($sorted); $i++) {
                if ($sorted[$i - 1]['id'] > $sorted[$i]['id']) {
                    return false;
                }
            }

            return true;
        }));


//        dd($sorted);
    }

    /**
     * Вернуть из массива только элементы, удовлетворяющие внешним условиям (например элементы с определенным id)
     * @return void
     */
    public function test_3()
    {
        $searchTo = ['key' => 'id', 'value' => 2];
        $found = collect($this->testArray)->where($searchTo['key'], $searchTo['value'])->values()->all();

        $this->assertTrue(call_user_func(function () use ($searchTo, $found) {
            foreach ($found as $elem) {
                if ($elem[$searchTo['key']] !== $searchTo['value']) {
                    return false;
                }
            }

            return true;
        }));

//        dd($found);
    }

    /**
     * Изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
     * @return void
     */
    public function test_4()
    {
        // Нет проверки на совпадение значений!
        // ['id' => 1, 'val' => 1] >> [1 => 'val'] (тест провалится)

        $flip = collect($this->testArray)
            ->map(fn ($elem) => collect($elem)->mapWithKeys(fn ($value, $key) => [$value => $key])->all())
            ->values()->all();

        $this->assertTrue(call_user_func(function () use ($flip) {
            foreach ($this->testArray as $index => $elem) {
                foreach ($elem as $key => $value) {
                    if (!isset($flip[$index][$value]) || $flip[$index][$value] !== $key) {
                        return false;
                    }
                }
            }

            return true;
        }));

//        dd($flip);
    }
}
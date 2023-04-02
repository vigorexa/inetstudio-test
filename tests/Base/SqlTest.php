<?php

namespace Vigorexa\InetstudioTest\Tests\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Vigorexa\InetstudioTest\Models\Department;
use Vigorexa\InetstudioTest\Models\Evaluation;
use Vigorexa\InetstudioTest\Models\Good;
use Vigorexa\InetstudioTest\Models\Respondent;
use Vigorexa\InetstudioTest\Models\Tag;
use Vigorexa\InetstudioTest\Tests\TestCase;

class SqlTest extends TestCase
{
    use RefreshDatabase;

    /**
     * В базе данных имеется таблица с товарами goods (id INTEGER, name TEXT), таблица с тегами tags (id INTEGER, name TEXT) и таблица связи товаров и тегов goods_tags (tag_id INTEGER, goods_id INTEGER, UNIQUE(tag_id, goods_id)). Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.
     * @return void
     */
    public function test_5()
    {
        // Kinda seed
        Good::insert([['name' => 'good_1'], ['name' => 'good_2'], ['name' => 'good_3'], ['name' => 'good_4']]);
        Tag::insert([['name' => 'tag_1'], ['name' => 'tag_2'], ['name' => 'tag_3'], ['name' => 'tag_4']]);
        Good::first()->tags()->sync([1, 2, 3, 4]);
        Good::skip(1)->first()->tags()->sync([1, 2, 3]);


        // Query
        $goodsWithAllTags = Good::withCount('tags')->where('tags_count', Tag::count())->get();


//        dd($goodsWithAllTags);
    }

    /**
     * Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины, и все они (каждый) поставили высокую оценку (строго выше 5).
     * @return void
     */
    public function test_6()
    {
        // Kinda seed
        Respondent::insert([['name' => 'respondent-1'], ['name' => 'respondent-2'], ['name' => 'respondent-3']]);
        Department::insert([['name' => 'department-1'], ['name' => 'department-2'], ['name' => 'department-3']]);
        Evaluation::insert([
            ['respondent_id' => 1, 'department_id' => 1, 'value' => 1, 'gender' => false],
            ['respondent_id' => 2, 'department_id' => 2, 'value' => 6, 'gender' => true],
            ['respondent_id' => 3, 'department_id' => 1, 'value' => 1, 'gender' => false],
            ['respondent_id' => 1, 'department_id' => 2, 'value' => 6, 'gender' => true],
        ]);

        // Query
        $departments = Department::whereHas('evaluations', function (Builder $query) {
            $query->where('gender', true)->where('value', '>', 5);
        })->get();


//        dd($departments);
    }
}
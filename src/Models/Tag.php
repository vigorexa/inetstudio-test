<?php

namespace Vigorexa\InetstudioTest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function goods(): BelongsToMany
    {
        return $this->belongsToMany(Good::class, 'tags_goods_pivot');
    }
}
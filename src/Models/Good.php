<?php

namespace Vigorexa\InetstudioTest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Good extends Model
{
    protected $fillable = ['name'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tags_goods_pivot');
    }
}
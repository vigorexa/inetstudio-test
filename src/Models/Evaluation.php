<?php

namespace Vigorexa\InetstudioTest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evaluation extends Model
{
    protected $fillable = ['value', 'gender'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function respondent(): BelongsTo
    {
        return $this->belongsTo(Respondent::class);
    }
}
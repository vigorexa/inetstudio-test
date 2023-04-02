<?php

namespace Vigorexa\InetstudioTest\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Respondent extends Model
{
    protected $fillable = ['name'];

    public function evaluations(): HasMany
    {
        return $this->hasMany(Evaluation::class);
    }
}
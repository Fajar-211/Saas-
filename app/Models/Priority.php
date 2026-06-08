<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['level', 'name'])]
class Priority extends Model
{
    /** @use HasFactory<\Database\Factories\PriorityFactory> */
    use HasFactory;

    public function divisions(): HasMany
    {
        return $this->hasMany(Division::class, 'level_id');
    }
}

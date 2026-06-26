<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['level_id', 'name', 'slug', 'description', 'hexa'])]
class Division extends Model
{
    /** @use HasFactory<\Database\Factories\DivisionFactory> */
    use HasFactory;

    public function level(): BelongsTo
    {
        return $this->belongsTo(Priority::class, 'level_id');
    }
    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'division_id');
    }



    //RELASI HANYA UNTUK DIVISI LEVEL 3
    public function watch(): HasMany
    {
        return $this->hasMany(Watch::class, 'division_id');
    }
}

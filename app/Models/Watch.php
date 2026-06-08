<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//MODEL INI HANYA DIGUNAKAN UNTUK FUNGSI PENGAWASAN SUPERVISOR KE DIVISI LAIN (KECUALI USER LEVEL 1)

#[Fillable(['user_id', 'division_id'])]
class Watch extends Model
{
    /** @use HasFactory<\Database\Factories\WatchFactory> */
    use HasFactory;

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}

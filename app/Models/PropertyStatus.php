<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyStatus extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    const ActiveProperty = 1;
    const InActiveProperty = 2;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Todo extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];

    public function todos(): HasMany
    {
        return $this->hasMany(Todo::class);
    }
}

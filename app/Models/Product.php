<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'cost',
        'number',
        'title',
        'description',
    ];

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}

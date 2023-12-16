<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function products(): HasMany
    {
        return $this->hasMany(Product::class)
            ->orderBy('id', 'desc');
    }
}

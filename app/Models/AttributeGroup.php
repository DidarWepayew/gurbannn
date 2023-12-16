<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeGroup extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class)
            ->orderBy('sort_order');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function attributeGroup(): BelongsTo
    {
        return $this->belongsTo(AttributeGroup::class);
    }


    public function attributeValues(): HasMany
    {
        return $this->hasMany(AttributeValue::class)
            ->orderBy('sort_order');
    }
}

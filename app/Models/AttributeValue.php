<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeValue extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    protected $hidden = ['pivot'];


    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}

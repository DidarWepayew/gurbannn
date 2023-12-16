<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    const UPDATED_AT = null;


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function status()
    {
        return [
            trans('app.pending'),
            trans('app.accepted'),
            trans('app.declined'),
        ][$this->status];
    }


    public function statusIcon()
    {
        return [
            'clock',
            'check-lg',
            'x-lg',
        ][$this->status];
    }


    public function statusColor()
    {
        return [
            'warning',
            'success',
            'danger',
        ][$this->status];
    }
}

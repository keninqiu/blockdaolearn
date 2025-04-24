<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mini extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'minis';

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'content',
        'order',
        'reading_time',
        'xp'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
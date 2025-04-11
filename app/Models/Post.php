<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = [
        'user_id',
        'language_id',
        'slug',
        'title',
        'content',
        'image'
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
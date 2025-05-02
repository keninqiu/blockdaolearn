<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'content',
        'order',
        'reading_time',
        'xp',
        'image'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coursePostMaps(): HasMany
    {
        return $this->hasMany(CoursePostMap::class);
    }

}
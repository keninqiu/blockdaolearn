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
        'emoji',
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

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'course_post_maps', 'course_id', 'post_id')
        ->withPivot('order')
        ->orderBy('course_post_maps.order');;
    }

}
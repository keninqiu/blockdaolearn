<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MiniPostMap extends Model
{
    public $timestamps = false;
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mini_post_maps';

    protected $fillable = [
        'user_id',
        'mini_id',
        'post_id'
    ];

    public function mini(): BelongsTo
    {
        return $this->belongsTo(Mini::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
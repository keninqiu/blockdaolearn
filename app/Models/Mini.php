<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mini extends Model
{
    public $timestamps = false;
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
        'order',
        'reading_time',
        'xp'
    ];
}
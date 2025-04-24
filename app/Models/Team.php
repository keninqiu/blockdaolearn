<?php

namespace App\Models;

use Laratrust\Models\Team as LaratrustTeam;

class Team extends LaratrustTeam
{
    public $guarded = [];

    protected $fillable = [
        'user_id',
        'name',
        'display_name',
        'description',
        'avatar'
    ];
}
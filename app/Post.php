<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'create_user_id',
        'create_user',
        'title',
        'body',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}

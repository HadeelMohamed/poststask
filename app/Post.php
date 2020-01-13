<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'body','blog_id','image'
    ];

    public function users_posts()
    {
        return $this->belongsTo('App\Blog','blog_id');
    }
}

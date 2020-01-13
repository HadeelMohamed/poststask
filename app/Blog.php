<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
      'user_id'
    ];
    public function users_blog()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function posts()
    {
        return $this->hasMany('App\Post', 'blog_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment')->whereNull('parent_id');
    }

}

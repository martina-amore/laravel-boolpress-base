<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function postInformation(){
        return $this->hasOne('App\PostInformation', 'post_id', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function tag(){
        return $this->belongsToMany('App\Tag', 'posts_tags', 'post_id', 'tag_id');
    }
}

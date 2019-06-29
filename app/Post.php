<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'author', 'image', 'category_id', 'content', 'slug'
    ];

    protected $dates = ['deleted_at'];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getImageAttribute($image)
    {
        return asset($image);
    }
}

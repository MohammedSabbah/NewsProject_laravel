<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'category', 'category', 'category_id', 'category_seo_description',
        'category_seo_name', 'seo_description', 'seo_name', 'seo_title', 'type', 'content'];


    public function scopeGetLatest()
    {
        return $this->orderBy('created_at', 'desc');
    }

    public function images()
    {
        return $this->hasMany(Image::class)->select(array('news_id','name'));
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return substr($value, 0, 10);
    }

    public function getUpdatedAtAttribute($value)
    {
        return substr($value, 0, 10);
    }
}

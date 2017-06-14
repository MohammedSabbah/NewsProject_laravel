<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'category', 'category', 'category_id', 'category_seo_description',
        'category_seo_name', 'seo_description', 'seo_name', 'seo_title', 'type', 'content'];


    public function scopeGetLatest()
    {
        return $this->orderBy('created_at', 'desc')->with('images','tags');
    }

    public function images()
    {
        return $this->hasMany(Image::class)->select(array('news_id','name'));
    }

    public function tags()
    {
        return $this->hasMany(Tag::class)->select(array('news_id','name'));
    }
}

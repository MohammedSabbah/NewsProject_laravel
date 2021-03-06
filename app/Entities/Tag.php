<?php

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['title'];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}

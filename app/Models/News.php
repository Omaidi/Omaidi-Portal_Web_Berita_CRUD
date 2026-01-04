<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'brief_overview',
        'content',
        'image',
        'category',
        'status',
        'author',
        'published_at',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

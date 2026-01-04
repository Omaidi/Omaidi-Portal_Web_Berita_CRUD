<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['news_id', 'name', 'email', 'content'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}

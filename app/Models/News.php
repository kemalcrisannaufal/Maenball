<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $fillable = [
        'title',
        'content',
        'thumbnail',
    ];

    public function comments()
    {
        return $this->hasMany(NewsComment::class, 'news_id', 'id');
    }
}

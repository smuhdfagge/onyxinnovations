<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostTag extends Model
{
    protected $table = 'blog_post_tag';

    protected $fillable = [
        'blog_post_id',
        'tag',
    ];

    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(BlogPost::class);
    }
}

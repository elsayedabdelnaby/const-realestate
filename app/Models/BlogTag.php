<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $table = 'tags_blogs';

    protected $fillable = ['blog_id', 'tag_id'];

    public function Blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }

    public function Tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}

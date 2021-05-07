<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['title', 'description', 'creator', 'meta_title', 'meta_keywords', 'meta_description', 'meta_slug'];
}

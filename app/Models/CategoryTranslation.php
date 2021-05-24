<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['name', 'meta_title', 'meta_keywords', 'meta_description', 'meta_slug'];
    protected $table = 'categories_translations';
}

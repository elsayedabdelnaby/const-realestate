<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SEO extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    protected $table = 'seo_pages';
    protected $translationForeignKey = 'seo_page_id';

    protected $translatedAttributes = ['meta_title', 'meta_keywords', 'meta_description'];

    protected $fillable = ['page_name'];
}

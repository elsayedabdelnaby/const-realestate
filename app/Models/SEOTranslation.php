<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SEOTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['meta_title', 'meta_keywords', 'meta_description'];
    protected $table = 'seo_page_translation';
}

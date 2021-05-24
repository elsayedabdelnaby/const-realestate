<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name', 'meta_title', 'meta_keywords', 'meta_description', 'meta_slug'];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    } // end of get name attribute
}

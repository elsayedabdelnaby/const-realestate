<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Tag extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name'];

    /**
     * Get all of the blogs that are assigned this tag.
     */
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'tags_blogs');
    }
}

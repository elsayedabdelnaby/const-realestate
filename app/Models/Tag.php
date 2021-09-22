<?php

namespace App\Models;

use App\Models\Admin\Blog;
use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Tag extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name', 'slug'];

    protected $fillable = ['is_active', 'is_popular_tag'];
    /**
     * Get all of the blogs that are assigned this tag.
     */
    public function blogs()
    {
        return $this->morphedByMany(Blog::class, 'taggable');
    }

    /**
     * Get all of the properties that are assigned this tag.
     */
    public function properties()
    {
        return $this->morphedByMany(Property::class, 'taggable');
    }
}

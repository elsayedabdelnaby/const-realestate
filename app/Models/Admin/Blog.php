<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['title', 'description', 'creator'];
    protected $guarded = [];

    protected $appends = [
        'image_path',
    ];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    } // end of get title attribute

    public function getImagePathAttribute()
    {
        return asset('public/uploads/blogs/' . $this->image);
    } // end of image path
}

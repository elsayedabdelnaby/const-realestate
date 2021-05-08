<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Blog extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['title', 'description', 'creator', 'meta_title', 'meta_keywords', 'meta_description', 'meta_slug'];
    protected $guarded = [];

    protected $appends = [
        'image_path',
    ];

    protected $fillable = ['image', 'is_active', 'show_in_homepage'];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    } // end of get title attribute

    public function getImagePathAttribute()
    {
        return asset('uploads/blogs/' . $this->image);
    } // end of image path

}

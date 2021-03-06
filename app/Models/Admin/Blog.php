<?php

namespace App\Models\Admin;

use App\Models\Category;
use App\Models\Tag;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class Blog extends Model
{
    use Translatable, Commentable;
    use SoftDeletes;

    public $translatedAttributes = ['title', 'description', 'creator', 'meta_title', 'meta_keywords', 'meta_description', 'meta_slug'];
    protected $guarded = [];

    protected $appends = [
        'image_path',
    ];

    protected $fillable = ['image', 'is_active', 'show_in_homepage', 'category_id'];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getImagePathAttribute()
    {
        return asset('public/uploads/blogs/' . $this->image);
    }

    /**
     * Get all of the tags that are assigned this tag.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_blogs');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}

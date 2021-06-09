<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhyChooseUs extends Model implements TranslatableContract
{
    use SoftDeletes, Translatable;

    protected $table = 'why_choose_us';
    public $translatedAttributes = ['title', 'description'];

    protected $appends = [
        'image_path',
    ];

    protected $fillable = ['image', 'is_active'];

    public function getImagePathAttribute()
    {
        return asset('public/uploads/whychooseus/' . $this->image);
    }
}

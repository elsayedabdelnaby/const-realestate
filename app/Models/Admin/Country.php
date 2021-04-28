<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];

    protected $appends = [
        'image_path',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    } // end of get name attribute

    public function getImagePathAttribute()
    {
        return asset('public/uploads/countries/' . $this->image);
    } // end of image path

    public function cities()
    {
        return $this->hasMany(City::class);

    } // end of cities

    public function properties()
    {
        return $this->hasMany(Property::class);

    } // end of properties


    public function agencies()
    {
        return $this->hasMany(Agency::class);

    } // end of agencies

} // end of model

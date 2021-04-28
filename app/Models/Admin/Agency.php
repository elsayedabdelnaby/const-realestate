<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name', 'description', 'address'];
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
        return asset('public/uploads/agencies/' . $this->image);
    } // end of image path

    public function city()
    {
        return $this -> belongsTo(City::class);

    } // end of city

    public function country()
    {
        return $this -> belongsTo(Country::class);

    } // end of country

    public function properties()
    {
        return $this->hasMany(Property::class);

    } // end of properties



} // end of model

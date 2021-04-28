<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];


    public function getNameAttribute($value)
    {
        return ucfirst($value);
    } // end of get name attribute

    public function country()
    {
        return $this -> belongsTo(Country::class);
    } // end of country

    public function properties()
    {
        return $this->hasMany(Property::class);

    } // end of properties

    public function agencies()
    {
        return $this->hasMany(Agency::class);

    } // end of agencies

} // end of model

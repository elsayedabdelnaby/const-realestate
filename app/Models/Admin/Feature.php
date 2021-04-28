<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Feature extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];

    public $timestamps = true;

    public function properties()
    {
        return $this -> belongsToMany(
                    Property::class ,
                    'feature_property',
            'feature_id',
            'property_id'
        );
    } // end of properties
}

<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model implements TranslatableContract
{
    use SoftDeletes, Translatable;

    public $translatedAttributes = ['name', 'description', 'address', 'meta_title', 'meta_keywords', 'meta_description', 'slug'];

    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return asset('public/uploads/projects/' . $this -> image);
    }

    public function getGalleryItemsAttribute()
    {
        if($this -> gallery != null){
            foreach (json_decode( $this -> gallery, true) as $index => $item){
                echo '{id: ' . $index . ' , src: "' . asset('public/uploads/projects/gallery/') . '/'. $item . '"},';
            }
        }
    }

    public function getSketchesItemsAttribute()
    {
        if($this -> gallery != null){
            foreach (json_decode( $this -> sketches, true) as $index => $item){
                echo '{id: ' . $index . ' , src: "' . asset('public/uploads/properties/sketches/') . '/'. $item . '"},';
            }
        }
    }

    public function agency()
    {
        return $this -> belongsTo(Agency::class);

    }

    public function getActive()
    {
        return $this -> is_active == 1 ? 'Active' : '';
    } // end fo get Active

    public function getFeatured()
    {
        return $this -> is_featured == 1 ? 'Featured' : '';
    } // end fo get Featured

    public function getFinishStatus()
    {
        return $this -> finish_status == 1 ? 'Finished' : '';
    } // end fo get Finish Status

}

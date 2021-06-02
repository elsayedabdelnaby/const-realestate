<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model implements TranslatableContract
{
    use Translatable;

    protected $table = 'site_settings';
    public $translatedAttributes = ['title', 'meta_title', 'meta_description', 'meta_keyword'];

    protected $appends = [
        'logo_path',
        'footer_logo_path'
    ];

    protected $fillable = ['logo', 'footer_logo'];

    public function getLogoPathAttribute()
    {
        return asset('public/front/images/' . $this -> logo);
    }

    public function getFooterLogoPathAttribute()
    {
        return asset('public/front/images/' . $this -> footer_logo);
    }

}

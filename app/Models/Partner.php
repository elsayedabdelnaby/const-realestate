<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $fillable = ['is_active', 'logo'];
    protected $appends = [
        'logo_path',
    ];

    public function getLogoPathAttribute()
    {
        return asset('public/uploads/partners/' . $this->logo);
    }
}

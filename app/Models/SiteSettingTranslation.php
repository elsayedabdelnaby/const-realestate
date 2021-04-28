<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSettingTranslation extends Model
{
    protected $table = 'site_settings_translation';

    protected $fillable = ['title', 'meta_description', 'meta_title', 'meta_keyword'];
}

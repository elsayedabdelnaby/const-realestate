<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    protected $table = 'tags_translation';

    protected $fillable = ['name'];
}

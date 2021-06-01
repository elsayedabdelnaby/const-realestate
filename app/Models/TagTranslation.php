<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'tags_translation';

    protected $fillable = ['name', 'slug'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['name', 'description', 'address', 'meta_title', 'meta_description', 'meta_keywords', 'slug'];
}

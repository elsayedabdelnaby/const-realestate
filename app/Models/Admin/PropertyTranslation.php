<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['name', 'description', 'address', 'meta_title', 'meta_description', 'meta_keywords', 'meta_slug'];

} // end of model

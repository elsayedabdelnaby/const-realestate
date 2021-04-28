<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgencyTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['name', 'description', 'address'];
}

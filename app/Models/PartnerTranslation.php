<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'partners_translations';
    public $timestamps = true;
    protected $fillable = ['name'];
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyTranslation extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['name'];
}

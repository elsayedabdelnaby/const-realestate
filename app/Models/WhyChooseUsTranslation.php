<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUsTranslation extends Model
{
    protected $table = 'why_choose_us_translation';

    protected $fillable = ['title', 'description'];
}

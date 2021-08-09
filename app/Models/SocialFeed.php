<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialFeed extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'social_feeds';
    protected $fillable = ['type', 'title', 'url', 'feed', 'display_in_home'];

}

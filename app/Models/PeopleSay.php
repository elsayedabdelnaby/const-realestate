<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PeopleSay extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'people_says';

    protected $fillable = ['name', 'job', 'url', 'image', 'say', 'is_active'];

    protected $appends = [
        'image_path',
    ];

    public function getImagePathAttribute()
    {
        return asset('public/uploads/peoplesays/' . $this->image);
    }
}

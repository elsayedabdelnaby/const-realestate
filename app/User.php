<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'first_name',  'last_name','email', 'password', 'image'
    ];

    protected $hidden = [
        'password', 'remember_token', 'deleted_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'image_path',
    ];

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    } // end of get first name attribute

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    } // end of get last name attribute

    public function getFullNameAttribute()
    {
        return $this -> first_name . ' ' . $this -> last_name;
    } // end of full name

    public function getImagePathAttribute()
    {
        return asset('public/uploads/users/' . $this->image);
    } // end of image path
}

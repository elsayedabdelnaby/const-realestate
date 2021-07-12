<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ContactUsMessage extends Model
{
    protected $table = 'contact_us_messages';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoom extends Model
{
    //
    protected $table = 'user_room';
    protected $fillable = ['user_id','room_id'];
}

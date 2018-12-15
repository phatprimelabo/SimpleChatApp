<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $table = 'chat_rooms';
    protected $fillable = [];

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_room', 'room_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message', 'room_id', 'id');
    }
}

<?php

namespace App;

use App\UserRoom;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = 'message';
    protected $fillable = ['room_id', 'user_id'];
    public function user(){
        return $this->hasOne('App\User', 'id','user_id');
    }
    public function set_partner_unread(){
        //DB::table('user_room')->where('room_id','=',$this.room_id)->where('user_id','<>',$this.user_id)->update(['is_read'=>0]);
    }
}

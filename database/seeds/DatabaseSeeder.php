<?php

use Illuminate\Database\Seeder;
use App\Room;
use App\User;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        for ($i=2;$i<8;$i++ ){
            $phat = User::find(1);
            $friend = User::find($i);
            Room::insert(['name'=>$phat->name." và ".$friend->name, 'type'=>1]);
            DB::table('user_room')->insert([
                ['user_id'=>$phat->id, 'room_id'=>$i-1],
                ['user_id'=>$friend->id, 'room_id'=>$i-1]
            ]);
        }
    }
}

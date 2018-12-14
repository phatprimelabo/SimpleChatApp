<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['name'=>'Phát Nguyễn',  'email'=>'nnphat6492@gmail.com', 'password'=>Hash::make('123456')],
            ['name'=>'Sói Nguyễn',  'email'=>'soi@gmail.com', 'password'=>Hash::make('123456')],
            ['name'=>'Quân Nguyễn',  'email'=>'quan@gmail.com', 'password'=>Hash::make('123456')],
            ['name'=>'Ngân Nguyễn',  'email'=>'ngan@gmail.com', 'password'=>Hash::make('123456')],
            ['name'=>'Thủy Nguyễn',  'email'=>'thuy@gmail.com', 'password'=>Hash::make('123456')],
            ['name'=>'Nga Nguyễn',  'email'=>'nga@gmail.com', 'password'=>Hash::make('123456')],
            ['name'=>'Trân Nguyễn',  'email'=>'tran@gmail.com', 'password'=>Hash::make('123456')],
        ]);
    }
}

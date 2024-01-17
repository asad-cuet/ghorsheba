<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Hash;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->insert([
            [
                "name"=> "Demo Admin",
                "email"=>"admin@gmail.com",
                "password"=>Hash::make("password"),
                "utype"=>"ADM",
                "email_verified_at"=>date('Y-m-d H:i:s',time())
            ]
            ]);
        DB::table('users')->insert([
            [
                "name"=> "Demo Student",
                "email"=>"student@gmail.com",
                "password"=>Hash::make("password"),
                "utype"=>"CST",
                "room_no"=>426,
                "email_verified_at"=>date('Y-m-d H:i:s',time())
            ]
            ]);
        DB::table('users')->insert([
            [
                "name"=> "Demo Service Provider",
                "email"=>"service@gmail.com",
                "password"=>Hash::make("password"),
                "utype"=>"SVP",
                "email_verified_at"=>date('Y-m-d H:i:s',time())
            ],
            [
                "name"=> "Demo Service Provider 1",
                "email"=>"service1@gmail.com",
                "password"=>Hash::make("password"),
                "utype"=>"SVP",
                "email_verified_at"=>date('Y-m-d H:i:s',time())
            ],
            [
                "name"=> "Demo Service Provider 2",
                "email"=>"service2@gmail.com",
                "password"=>Hash::make("password"),
                "utype"=>"SVP",
                "email_verified_at"=>date('Y-m-d H:i:s',time())
            ],
            [
                "name"=> "Demo Service Provider 3",
                "email"=>"service3@gmail.com",
                "password"=>Hash::make("password"),
                "utype"=>"SVP",
                "email_verified_at"=>date('Y-m-d H:i:s',time())
            ],
            ]);
    }
}

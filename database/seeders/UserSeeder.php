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
            ]
            ]);
    }
}

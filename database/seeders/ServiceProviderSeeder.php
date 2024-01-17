<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServiceProviderSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('service_providers')->insert([
            [
                "user_id"=> 3,
                "image"=>"ac-installation.png",
                "about"=>"ac installation",
                "city"=>"Chittagong",
                "service_category_id"=>1,
                "service_locations"=>"CUET",
                "is_active"=>1,
            ],
            [
                "user_id"=> 4,
                "image"=>"ac-installation.png",
                "about"=>"ac installation",
                "city"=>"Chittagong",
                "service_category_id"=>1,
                "service_locations"=>"CUET",
                "is_active"=>1,
            ],
            [
                "user_id"=> 5,
                "image"=>"ac uninstallation.png",
                "about"=>"ac uninstallation",
                "city"=>"Chittagong",
                "service_category_id"=>2,
                "service_locations"=>"CUET",
                "is_active"=>1,
            ],
            [
                "user_id"=> 6,
                "image"=>"ac uninstallation.png",
                "about"=>"ac uninstallation",
                "city"=>"Chittagong",
                "service_category_id"=>2,
                "service_locations"=>"CUET",
                "is_active"=>1,
            ],
            ]);
    }
}

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
                "complain_category_id"=>1,
                "is_active"=>1,
            ],
            [
                "user_id"=> 4,
                "image"=>"ac-installation.png",
                "complain_category_id"=>1,
                "is_active"=>1,
            ],
            [
                "user_id"=> 5,
                "image"=>"ac uninstallation.png",
                "complain_category_id"=>2,
                "is_active"=>1,
            ],
            [
                "user_id"=> 6,
                "image"=>"ac uninstallation.png",
                "complain_category_id"=>2,
                "is_active"=>1,
            ],
            ]);
    }
}

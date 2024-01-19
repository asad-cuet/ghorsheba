<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    
    public function run()
    {
        DB::table('complain_categories')->insert([
            [
                "name"=> "AC Installation",
                "slug"=>"ac-installation",
                "image"=>"ac installation.png",
                
            ],
            [
                "name"=> "AC Uninstallation",
                "slug"=>"ac-uninstallation",
                "image"=>"ac uninstallation.png",
            ],
            [
                "name"=> "AC Repair",
                "slug"=>"ac-repair",
                "image"=>"ac repair.png",
            ],
            [
                "name"=> "Laundry",
                "slug"=>"laundry",
                "image"=>"laundry.png",
            ],
            [
                "name"=> "Electrical",
                "slug"=>"electrical",
                "image"=>"electrical.png",
            ],
            [
                "name"=> "Plumbing",
                "slug"=>"plumbing",
                "image"=>"plumbing.png",
            ],
            [
                "name"=> "Painting",
                "slug"=>"painting",
                "image"=>"painting.png",
            ],
            [
                "name"=> "House Shifitng",
                "slug"=>"house shifitng",
                "image"=>"house-shifitng.png",
            ],
            [
                "name"=> "Tank Cleaning",
                "slug"=>"tank cleaning",
                "image"=>"tank-cleaning.png",
            ],
            [
                "name"=> "Furniture",
                "slug"=>"furniture",
                "image"=>"furniture.png",
            ],
            [
                "name"=> "Home Deep Cleaning",
                "slug"=>"home-deep-cleaning",
                "image"=>"home deep cleaning.png",
            
            ],
            [
                "name"=> "Bathroom Deep Cleaning",
                "slug"=>"bathroom-deep-cleaning",
                "image"=>"bathroom deep cleaning.png",
            
            ]
            
            ]);
    }
}

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
                "coverimage"=>"test"
                
            ],
            [
                "name"=> "AC Uninstallation",
                "slug"=>"ac-uninstallation",
                "image"=>"ac uninstallation.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "AC Repair",
                "slug"=>"ac-repair",
                "image"=>"ac repair.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "Laundry",
                "slug"=>"laundry",
                "image"=>"laundry.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "Electrical",
                "slug"=>"electrical",
                "image"=>"electrical.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "Plumbing",
                "slug"=>"plumbing",
                "image"=>"plumbing.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "Painting",
                "slug"=>"painting",
                "image"=>"painting.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "House Shifitng",
                "slug"=>"house shifitng",
                "image"=>"house-shifitng.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "Tank Cleaning",
                "slug"=>"tank cleaning",
                "image"=>"tank-cleaning.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "Furniture",
                "slug"=>"furniture",
                "image"=>"furniture.png",
                "coverimage"=>"test"
            ],
            [
                "name"=> "Home Deep Cleaning",
                "slug"=>"home-deep-cleaning",
                "image"=>"home deep cleaning.png",
                "coverimage"=>"test",
            ],
            [
                "name"=> "Bathroom Deep Cleaning",
                "slug"=>"bathroom-deep-cleaning",
                "image"=>"bathroom deep cleaning.png",
                "coverimage"=>"test",
            ]
            
            ]);
    }
}

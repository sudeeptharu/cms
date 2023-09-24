<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $gallery= new Gallery();
            $gallery->title = $faker->title;
            $gallery->description = $faker->text;
            $gallery->is_published = $faker->boolean;
            $gallery->save();
        }
    }
}

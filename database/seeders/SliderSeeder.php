<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;


class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $slider= new Slider();
            $slider->order = $faker->numberBetween(0,10);
            $slider->image = $faker->image;
            $slider->url = $faker->url;
            $slider->is_published = $faker->boolean;
            $slider->title = $faker->title;
            $slider->description = $faker->title;
            $slider->save();
        }
    }
}

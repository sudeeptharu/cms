<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $service= new Service();
            $service->title = $faker->title;
            $service->icon = $faker->title;
            $service->image = $faker->image;
            $service->description = $faker->text;
            $service->excerpt = $faker->text;
            $service->save();
        }
    }
}

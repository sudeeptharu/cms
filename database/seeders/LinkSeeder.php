<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Link;


class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $link= new Link();
            $link->social = $faker->name;
            $link->icon = $faker->name;
            $link->url = $faker->url;
            $link->save();
        }
    }
}

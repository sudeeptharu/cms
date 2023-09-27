<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\WebSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $webSetting= new WebSetting();
            $webSetting->key = $faker->password();
            $webSetting->value = $faker->title;
            $webSetting->image = $faker->image;
            $webSetting->align = $faker->title;
            $webSetting->save();
        }
    }
}

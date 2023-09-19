<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $menu= new Menu();
            $menu->order = $faker->numberBetween(0,10);
            $menu->url = $faker->url;
            $menu->is_published = $faker->boolean;
            $menu->title = $faker->title;
            $menu->opens_in_new_tab = $faker->boolean;
            $menu->parent_id = $faker->numberBetween(0,40);
            $menu->save();
        }
    }
}

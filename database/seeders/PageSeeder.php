<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;


class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $page= new Page();
            $page->title = $faker->title;
            $page->subtitle = $faker->title;
            $page->excerpt = $faker->title;
            $page->quote = $faker->title;
            $page->description = $faker->title;
            $page->draft = $faker->boolean;
            $page->image = $faker->image;
            $page->slug = $faker->title;
            $page->save();
        }
    }
}

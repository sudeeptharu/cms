<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $category= new Category();
            $category->title = $faker->name;
            $category->post_id = $faker->numberBetween(1 ,Post::count());
            $category->save();
        }
    }
}

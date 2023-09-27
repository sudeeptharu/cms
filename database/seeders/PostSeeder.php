<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $post= new Post();
            $post->title = $faker->title;
            $post->subtitle = $faker->title;
            $post->excerpt = $faker->title;
            $post->quote = $faker->title;
            $post->description = $faker->title;
            $post->draft = $faker->boolean;
            $post->image = $faker->image;
            $post->save();
        }
    }
}

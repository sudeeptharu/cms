<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0;$i<=100;$i++){
            $faker=Faker::create();
            $user= new User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->email_verified_at = $faker->dateTime;
            $user->password = $faker->password;
            $user->remember_token = $faker->password;
            $user->save();
        }
    }
}

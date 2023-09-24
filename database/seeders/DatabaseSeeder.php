<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Image;
use App\Models\Sidebar;
use Illuminate\Database\Seeder;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CategorySeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(LinkSeeder::class);
        $this->call(MenuSeeder::class);

        $this->call(ScrollerSeeder::class);
        $this->call(SliderSeeder::class);
//        $this->call(SidebarSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VideoSeeder::class);
        $this->call(WebSettingSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ServiceSeeder::class);





    }
}

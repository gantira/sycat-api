<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::factory(4)->create();
        \App\Models\Team::factory(4)->create();
        \App\Models\Post::factory(10)->create();
    }
}

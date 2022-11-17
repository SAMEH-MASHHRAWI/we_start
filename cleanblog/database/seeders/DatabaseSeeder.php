<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Post::truncate();
        User::truncate();

        User::factory(10)->create();
        Post::factory(150)->create();
        // \App\Models\User::factory(10)->create();
    }
}

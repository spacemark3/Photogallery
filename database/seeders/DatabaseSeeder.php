<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\AlbumFactory;
use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\User;
use App\Models\Photo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
    User::truncate();
    Album::truncate();
    Photo::truncate();
    
        User::factory(5)->has(
            Album::factory(5)->has(
                Photo::factory(200)
            )
        )->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

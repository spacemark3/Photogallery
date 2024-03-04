<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'album_name' => $this->faker->text(20),
            'album_thumb' =>$this->faker->imageUrl(),
            'description'=>$this->faker->text(120),
            'created_at'=>$this->faker->dateTime(),
            'user_id'=> User::factory()
        ];
    }
}

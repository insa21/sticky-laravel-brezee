<?php

namespace Database\Factories;

use App\Enums\StoreStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 10),
            'name' => $title = str(fake()->sentence())->title(),
            'slug' => str($title)->slug(), //todo: bisa juga di ambil dari observer
            'description' => fake()->paragraph(2, true),
            'status' => StoreStatus::ACTIVE,
        ];
    }
}
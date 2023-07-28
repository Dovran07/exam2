<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $days = DB::table('days')->inRandomOrder()->first();

        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'days_id' => $days->id,
        ];
    }
}

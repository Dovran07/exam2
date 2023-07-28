<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $salon = DB::table('salons')->inRandomOrder()->first();
        $membership = DB::table('memberships')->inRandomOrder()->first();
        $coach = DB::table('coaches')->inRandomOrder()->first();
        $days = DB::table('days')->inRandomOrder()->first();

        return [

            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'birthday' => fake()->dateTimeBetween('-50 years', '-14 years'),
            'gender' => fake()->boolean(50),
            'salon_id' => $salon->id,
            'membership_id' => $membership->id,
            'coach_id' => $coach->id,
            'days_id' => $days->id,
        ];
    }
}

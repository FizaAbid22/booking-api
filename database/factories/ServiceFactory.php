<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'  => fake()->randomElement(['Haircut', 'Dental Checkup', 'Math Tutoring', 'Massage', 'Eye Exam']),
            'price' => fake()->numberBetween(500,5000),
            'duration_minutes' => fake()->randomElement([15, 30, 45, 60, 90]),
       
            ];
    }
}

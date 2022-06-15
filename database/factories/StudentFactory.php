<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nrp' => $this->faker->numberBetween(12345678, 87654321),
            'name' => $this->faker->name(),
            'year' => $this->faker->year(),
            'major' => $this->faker->words(3, true),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\StudentCard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentCard>
 */
class StudentCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => 'STU-' . $this->faker->unique()->numberBetween(10000, 99999),
            'student_id' => StudentFactory::factory(),
        ];
    }
}

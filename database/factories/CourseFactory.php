<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_title'=> fake()->word(),
            'course_code' => 'CSE '.fake()->unique()->numberBetween(100, 999),
            'student_id' => fake()->numberBetween(1,100),
        ];
    }
}

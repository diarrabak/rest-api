<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Specialization;
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
    public function definition()
    {
        return [
            'code' => $this->faker->word,
            'title' => $this->faker->text(50),
            'description' => $this->faker->paragraph(2),
            'semester' => $this->faker->randomElement(['S1', 'S2', 'S3', 'S4']),
            'specialization_id' => Specialization::factory()->create()->id, //Specialization::factory(10)->random()->id,//$this->faker->random([1, 10]),
            'department_id' => Department::factory()->create()->id,
        ];
    }
}

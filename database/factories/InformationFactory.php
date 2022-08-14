<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'description' => $this->faker->paragraph(2),
            'document' => $this->faker->file('public/images','public/fakes'),
            'semester' => $this->faker->randomElement(['S1', 'S2', 'S3', 'S4']),
            'department_id' => Department::factory()->create()->id,
        ];
    }
}

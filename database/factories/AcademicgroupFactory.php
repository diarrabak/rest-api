<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Academicgroup>
 */
class AcademicgroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "description" => $this->faker->text(100),
            "picture" => $this->faker->image('public/images', 640, 480, null, false),
            "department_id" => Department::factory()->create()->id,
        ];
    }
}

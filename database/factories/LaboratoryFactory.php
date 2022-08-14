<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Laboratory>
 */
class LaboratoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(25),
            'description' => $this->faker->paragraph(2),
            'picture' => $this->faker->image(null, 640, 480, null),
            'user_id' =>User::factory()->create()->id,
            'department_id' => Department::factory()->create()->id,
        ];
    }
}

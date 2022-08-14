<?php

namespace Database\Factories;

use App\Models\Laboratory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
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
            'laboratory_id' =>Laboratory::factory()->create()->id, // all()->random()->id,
        ];
    }
}

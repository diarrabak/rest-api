<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Researchgroup>
 */
class ResearchgroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(25),
            'description'=>$this->faker->paragraph(2),
            'picture'=>$this->faker->image(null,640,480,null),
            'department_id'=>Department::factory()->create()->id,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
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
            'link' => $this->faker->text(100),
            'authors' => $this->faker->text(50),
            'publication' => $this->faker->paragraph(1),
            'year' => $this->faker->date(),
            "user_id" =>User::factory()->create()->id,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Academicgroup;
use App\Models\Department;
use App\Models\Researchgroup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'role' => $this->faker->randomElement(['Admin', 'Prof', 'Student', 'Other']),
            'phone_number' => $this->faker->phoneNumber,
            'avatar' => $this->faker->image('public/images', 640, 480, null, false),
            'researchgroup_id' => Researchgroup::factory()->create()->id,
            'department_id' => Department::factory()->create()->id,
            'academicgroup_id' => Academicgroup::factory()->create()->id,
            'research_gate' => $this->faker->text(100),
            'google_scholar' => $this->faker->text(100),
            'linkedin' => $this->faker->text(100),
            'facebook' => $this->faker->text(100),
            'tweeter' => $this->faker->text(100),
            'instagram' => $this->faker->text(100),

            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

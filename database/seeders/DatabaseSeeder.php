<?php

namespace Database\Seeders;

use App\Models\Academicgroup;
use App\Models\Article;
use App\Models\Course;
use App\Models\Department;
use App\Models\Equipment;
use App\Models\Information;
use App\Models\Jobopening;
use App\Models\Laboratory;
use App\Models\Researchgroup;
use App\Models\Role;
use App\Models\Specialization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Academicgroup::factory(10)->create();
        // User::factory(10)->create();
        Article::factory(10)->create();
        Course::factory(10)->create();
        // Department::factory(10)->create();
        Equipment::factory(10)->create();
        Information::factory(10)->create();
        Jobopening::factory(10)->create();
        // Laboratory::factory(10)->create();
        // Researchgroup::factory(10)->create();
        Role::factory(10)->create();
        // Specialization::factory(10)->create();
    }
}

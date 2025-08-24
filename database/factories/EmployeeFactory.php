<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nip' => $this->faker->unique()->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'department_id' => Department::factory(),
            'position_id' => Position::factory(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'address' => $this->faker->address(),
            'birth_date' => $this->faker->dateTimeBetween('-60 years', '-25 years'),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'hire_date' => $this->faker->dateTimeBetween('-10 years', '-1 year'),
        ];
    }
}
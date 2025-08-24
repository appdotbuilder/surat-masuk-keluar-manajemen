<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positions = [
            ['name' => 'Gubernur', 'level' => 1, 'rank' => 'IV/c'],
            ['name' => 'Wakil Gubernur', 'level' => 2, 'rank' => 'IV/c'],
            ['name' => 'Sekretaris Daerah', 'level' => 3, 'rank' => 'IV/b'],
            ['name' => 'Asisten Sekda', 'level' => 4, 'rank' => 'IV/a'],
            ['name' => 'Kepala Dinas', 'level' => 5, 'rank' => 'IV/a'],
            ['name' => 'Sekretaris Dinas', 'level' => 6, 'rank' => 'III/d'],
            ['name' => 'Kepala Bidang', 'level' => 7, 'rank' => 'III/d'],
            ['name' => 'Kepala Seksi', 'level' => 8, 'rank' => 'III/c'],
            ['name' => 'Staff Ahli', 'level' => 9, 'rank' => 'III/b'],
            ['name' => 'Staf', 'level' => 10, 'rank' => 'II/c'],
        ];

        $position = $this->faker->unique()->randomElement($positions);

        return [
            'name' => $position['name'],
            'code' => strtoupper($this->faker->unique()->lexify('???')),
            'description' => 'Jabatan ' . $position['name'],
            'rank' => $position['rank'],
            'level' => $position['level'],
            'is_active' => true,
        ];
    }
}
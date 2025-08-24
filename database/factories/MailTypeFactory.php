<?php

namespace Database\Factories;

use App\Models\MailType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MailType>
 */
class MailTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = [
            ['name' => 'Biasa', 'code' => 'B', 'priority' => 'normal', 'color' => '#6b7280'],
            ['name' => 'Penting', 'code' => 'P', 'priority' => 'high', 'color' => '#f59e0b'],
            ['name' => 'Rahasia', 'code' => 'R', 'priority' => 'high', 'color' => '#ef4444'],
            ['name' => 'Mendesak', 'code' => 'M', 'priority' => 'urgent', 'color' => '#dc2626'],
            ['name' => 'Segera', 'code' => 'S', 'priority' => 'urgent', 'color' => '#b91c1c'],
        ];

        $type = $this->faker->unique()->randomElement($types);

        return [
            'name' => $type['name'],
            'code' => $type['code'],
            'description' => 'Sifat surat ' . $type['name'],
            'priority' => $type['priority'],
            'color' => $type['color'],
            'is_active' => true,
        ];
    }
}
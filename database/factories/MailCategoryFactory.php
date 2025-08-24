<?php

namespace Database\Factories;

use App\Models\MailCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MailCategory>
 */
class MailCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            ['name' => 'Undangan', 'code' => 'UND', 'color' => '#3b82f6'],
            ['name' => 'Nota Dinas', 'code' => 'ND', 'color' => '#10b981'],
            ['name' => 'Surat Edaran', 'code' => 'SE', 'color' => '#f59e0b'],
            ['name' => 'Surat Keterangan', 'code' => 'SK', 'color' => '#8b5cf6'],
            ['name' => 'Surat Tugas', 'code' => 'ST', 'color' => '#ef4444'],
            ['name' => 'Laporan', 'code' => 'LPR', 'color' => '#06b6d4'],
            ['name' => 'Pemberitahuan', 'code' => 'PBR', 'color' => '#84cc16'],
            ['name' => 'Permohonan', 'code' => 'PMH', 'color' => '#f97316'],
        ];

        $category = $this->faker->unique()->randomElement($categories);

        return [
            'name' => $category['name'],
            'code' => $category['code'],
            'description' => 'Kategori surat ' . $category['name'],
            'color' => $category['color'],
            'is_active' => true,
        ];
    }
}
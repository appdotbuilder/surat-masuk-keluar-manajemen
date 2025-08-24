<?php

namespace Database\Factories;

use App\Models\OrganizationSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrganizationSetting>
 */
class OrganizationSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Pemerintah Provinsi Jawa Barat',
            'short_name' => 'Pemprov Jabar',
            'address' => 'Jl. Diponegoro No. 22, Bandung, Jawa Barat 40115',
            'phone' => '022-4264650',
            'email' => 'humas@jabarprov.go.id',
            'website' => 'https://jabarprov.go.id',
            'logo' => 'logo-jabar.png',
            'head_name' => 'Dr. H. Ridwan Kamil, S.T., M.U.D.',
            'head_nip' => '123456789012345678',
            'head_position' => 'Gubernur Jawa Barat',
            'mail_numbering_format' => [
                'incoming' => 'SM/{number}/{year}',
                'outgoing' => 'SK/{number}/{year}',
                'disposition' => 'DSP/{number}/{year}'
            ],
        ];
    }
}
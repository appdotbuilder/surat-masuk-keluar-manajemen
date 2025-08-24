<?php

namespace Database\Factories;

use App\Models\OutgoingMail;
use App\Models\MailCategory;
use App\Models\MailType;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OutgoingMail>
 */
class OutgoingMailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $recipients = [
            'Kementerian Dalam Negeri',
            'Kementerian Keuangan',
            'DPRD Provinsi',
            'Walikota Bandung',
            'Dinas Pendidikan Kota',
            'PT. Contractor Indonesia',
            'Universitas Teknologi',
            'Bank Indonesia',
            'Kejaksaan Tinggi',
            'Kantor Wilayah BPN',
        ];

        $subjects = [
            'Laporan Kegiatan Bulanan',
            'Permohonan Anggaran Tambahan',
            'Undangan Rapat Koordinasi',
            'Surat Keterangan Aktif',
            'Pemberitahuan Hasil Tender',
            'Laporan Pertanggungjawaban',
            'Permohonan Izin Kegiatan',
            'Surat Edaran Internal',
            'Nota Dinas Kepegawaian',
            'Laporan Evaluasi Program',
        ];

        return [
            'mail_number' => 'SK/' . $this->faker->unique()->numerify('###') . '/' . date('Y'),
            'mail_date' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'recipient' => $this->faker->randomElement($recipients),
            'subject' => $this->faker->randomElement($subjects),
            'content' => $this->faker->paragraph(3),
            'category_id' => MailCategory::factory(),
            'type_id' => MailType::factory(),
            'attachment' => $this->faker->optional()->fileExtension(),
            'status' => $this->faker->randomElement(['draft', 'sent', 'archived']),
            'created_by' => Employee::factory(),
            'approved_by' => $this->faker->optional()->randomElement([Employee::factory()]),
            'sent_at' => $this->faker->optional()->dateTimeBetween('-20 days', 'now'),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
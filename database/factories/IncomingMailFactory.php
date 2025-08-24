<?php

namespace Database\Factories;

use App\Models\IncomingMail;
use App\Models\MailCategory;
use App\Models\MailType;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IncomingMail>
 */
class IncomingMailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $senders = [
            'Kementerian Dalam Negeri',
            'Kementerian Keuangan',
            'Kementerian Pendidikan',
            'DPRD Provinsi',
            'Kantor Gubernur',
            'Dinas Pendidikan Provinsi',
            'PT. ABC Indonesia',
            'Yayasan XYZ',
            'Universitas Negeri',
            'BPK Perwakilan Daerah',
        ];

        $subjects = [
            'Undangan Rapat Koordinasi',
            'Laporan Pelaksanaan Kegiatan',
            'Permohonan Data Statistik',
            'Pemberitahuan Perubahan Jadwal',
            'Surat Edaran Kebijakan Baru',
            'Undangan Sosialisasi Program',
            'Laporan Keuangan Triwulan',
            'Permohonan Bantuan Teknis',
            'Pemberitahuan Hasil Audit',
            'Undangan Workshop',
        ];

        $mailDate = $this->faker->dateTimeBetween('-30 days', 'now');
        $receivedDate = $this->faker->dateTimeBetween($mailDate, 'now');

        return [
            'mail_number' => 'SM/' . $this->faker->unique()->numerify('###') . '/' . date('Y'),
            'sender_number' => $this->faker->numerify('###/XXX/####'),
            'mail_date' => $mailDate,
            'received_date' => $receivedDate,
            'sender' => $this->faker->randomElement($senders),
            'subject' => $this->faker->randomElement($subjects),
            'content' => $this->faker->paragraph(3),
            'category_id' => MailCategory::factory(),
            'type_id' => MailType::factory(),
            'attachment' => $this->faker->optional()->fileExtension(),
            'status' => $this->faker->randomElement(['pending', 'processed', 'archived']),
            'received_by' => Employee::factory(),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
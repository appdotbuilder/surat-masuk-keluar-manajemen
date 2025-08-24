<?php

namespace Database\Factories;

use App\Models\Announcement;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Pengumuman Libur Nasional',
            'Pemberitahuan Sistem Maintenance',
            'Sosialisasi Kebijakan Baru',
            'Undangan Rapat Koordinasi',
            'Pemberitahuan Perubahan Jam Kerja',
            'Pengumuman Seleksi Pegawai',
            'Info Workshop Pengembangan SDM',
            'Pemberitahuan Audit Internal',
            'Pengumuman Evaluasi Kinerja',
            'Info Pelatihan Teknis',
        ];

        $contents = [
            'Berkenaan dengan akan dilaksanakannya kegiatan tersebut, mohon kepada seluruh pegawai untuk dapat mengikuti sesuai dengan jadwal yang telah ditentukan.',
            'Dalam rangka meningkatkan kualitas pelayanan, akan dilaksanakan pemeliharaan sistem pada tanggal yang telah ditetapkan.',
            'Sehubungan dengan adanya kebijakan baru dari pemerintah pusat, mohon kepada seluruh unit untuk dapat menyesuaikan.',
            'Untuk koordinasi lebih lanjut terkait pelaksanaan program kerja tahun ini, dimohon kehadiran dari seluruh kepala unit.',
            'Mulai tanggal yang akan datang, jam kerja akan disesuaikan dengan ketentuan yang berlaku secara nasional.',
        ];

        return [
            'title' => $this->faker->randomElement($titles),
            'content' => $this->faker->randomElement($contents),
            'type' => $this->faker->randomElement(['general', 'urgent', 'event', 'policy']),
            'priority' => $this->faker->randomElement(['low', 'normal', 'high', 'urgent']),
            'is_published' => $this->faker->boolean(80),
            'published_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'expires_at' => $this->faker->optional()->dateTimeBetween('now', '+60 days'),
            'attachment' => $this->faker->optional()->fileExtension(),
            'created_by' => Employee::factory(),
        ];
    }
}
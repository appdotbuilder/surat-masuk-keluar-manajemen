<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Position;
use App\Models\Employee;
use App\Models\MailCategory;
use App\Models\MailType;
use App\Models\IncomingMail;
use App\Models\OutgoingMail;
use App\Models\Disposition;
use App\Models\Announcement;
use App\Models\OrganizationSetting;

class MailManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Organization Settings
        OrganizationSetting::factory()->create();

        // Create Departments
        $departments = [
            ['name' => 'Sekretariat Daerah', 'code' => 'SETDA'],
            ['name' => 'Dinas Pendidikan', 'code' => 'DISDIK'],
            ['name' => 'Dinas Kesehatan', 'code' => 'DINKES'],
            ['name' => 'Dinas Pekerjaan Umum', 'code' => 'DISPU'],
            ['name' => 'Dinas Sosial', 'code' => 'DINSOS'],
            ['name' => 'Dinas Pariwisata', 'code' => 'DISPAR'],
            ['name' => 'Dinas Pertanian', 'code' => 'DISTAN'],
            ['name' => 'Bappeda', 'code' => 'BAPPEDA'],
        ];

        foreach ($departments as $dept) {
            Department::create([
                'name' => $dept['name'],
                'code' => $dept['code'],
                'description' => 'Deskripsi ' . $dept['name'],
                'sort_order' => random_int(1, 10),
                'is_active' => true,
            ]);
        }

        // Create Positions
        $positions = [
            ['name' => 'Gubernur', 'code' => 'GUB', 'level' => 1, 'rank' => 'IV/c'],
            ['name' => 'Sekretaris Daerah', 'code' => 'SEKDA', 'level' => 2, 'rank' => 'IV/b'],
            ['name' => 'Kepala Dinas', 'code' => 'KADIS', 'level' => 3, 'rank' => 'IV/a'],
            ['name' => 'Sekretaris Dinas', 'code' => 'SEKDIS', 'level' => 4, 'rank' => 'III/d'],
            ['name' => 'Kepala Bidang', 'code' => 'KABID', 'level' => 5, 'rank' => 'III/d'],
            ['name' => 'Kepala Seksi', 'code' => 'KASI', 'level' => 6, 'rank' => 'III/c'],
            ['name' => 'Staff Ahli', 'code' => 'STAF', 'level' => 7, 'rank' => 'III/b'],
            ['name' => 'Staf', 'code' => 'STAFF', 'level' => 8, 'rank' => 'II/c'],
        ];

        foreach ($positions as $pos) {
            Position::create([
                'name' => $pos['name'],
                'code' => $pos['code'],
                'description' => 'Jabatan ' . $pos['name'],
                'rank' => $pos['rank'],
                'level' => $pos['level'],
                'is_active' => true,
            ]);
        }

        // Create Mail Categories
        $categories = [
            ['name' => 'Undangan', 'code' => 'UND', 'color' => '#3b82f6'],
            ['name' => 'Nota Dinas', 'code' => 'ND', 'color' => '#10b981'],
            ['name' => 'Surat Edaran', 'code' => 'SE', 'color' => '#f59e0b'],
            ['name' => 'Surat Keterangan', 'code' => 'SK', 'color' => '#8b5cf6'],
            ['name' => 'Surat Tugas', 'code' => 'ST', 'color' => '#ef4444'],
            ['name' => 'Laporan', 'code' => 'LPR', 'color' => '#06b6d4'],
            ['name' => 'Pemberitahuan', 'code' => 'PBR', 'color' => '#84cc16'],
        ];

        foreach ($categories as $cat) {
            MailCategory::create([
                'name' => $cat['name'],
                'code' => $cat['code'],
                'description' => 'Kategori surat ' . $cat['name'],
                'color' => $cat['color'],
                'is_active' => true,
            ]);
        }

        // Create Mail Types
        $types = [
            ['name' => 'Biasa', 'code' => 'B', 'priority' => 'normal', 'color' => '#6b7280'],
            ['name' => 'Penting', 'code' => 'P', 'priority' => 'high', 'color' => '#f59e0b'],
            ['name' => 'Rahasia', 'code' => 'R', 'priority' => 'high', 'color' => '#ef4444'],
            ['name' => 'Mendesak', 'code' => 'M', 'priority' => 'urgent', 'color' => '#dc2626'],
            ['name' => 'Segera', 'code' => 'S', 'priority' => 'urgent', 'color' => '#b91c1c'],
        ];

        foreach ($types as $type) {
            MailType::create([
                'name' => $type['name'],
                'code' => $type['code'],
                'description' => 'Sifat surat ' . $type['name'],
                'priority' => $type['priority'],
                'color' => $type['color'],
                'is_active' => true,
            ]);
        }

        // Get departments and positions for employees
        $departmentIds = Department::pluck('id')->toArray();
        $positionIds = Position::pluck('id')->toArray();

        // Create Employees
        $employees = [
            ['name' => 'Dr. Ahmad Suryadi', 'nip' => '196801011990031001', 'email' => 'ahmad.suryadi@email.com'],
            ['name' => 'Dra. Siti Nurhasanah', 'nip' => '197205152000032001', 'email' => 'siti.nurhasanah@email.com'],
            ['name' => 'Ir. Bambang Wijaya', 'nip' => '196912101995031002', 'email' => 'bambang.wijaya@email.com'],
            ['name' => 'Dr. Ratna Sari, M.Si', 'nip' => '198003201205032001', 'email' => 'ratna.sari@email.com'],
            ['name' => 'Drs. Agus Prasetyo', 'nip' => '197008151998031003', 'email' => 'agus.prasetyo@email.com'],
            ['name' => 'Sri Wahyuni, S.Kom', 'nip' => '198506102010032001', 'email' => 'sri.wahyuni@email.com'],
            ['name' => 'M. Fajar Rahman', 'nip' => '199201152018031001', 'email' => 'fajar.rahman@email.com'],
            ['name' => 'Lia Kartika, S.E', 'nip' => '198912202015032001', 'email' => 'lia.kartika@email.com'],
        ];

        foreach ($employees as $emp) {
            Employee::create([
                'name' => $emp['name'],
                'nip' => $emp['nip'],
                'email' => $emp['email'],
                'phone' => '08' . random_int(10000000, 99999999),
                'department_id' => $departmentIds[array_rand($departmentIds)],
                'position_id' => $positionIds[array_rand($positionIds)],
                'status' => 'active',
                'address' => 'Alamat ' . $emp['name'],
                'birth_date' => now()->subYears(random_int(30, 55))->subDays(random_int(1, 365)),
                'gender' => random_int(0, 1) ? 'male' : 'female',
                'hire_date' => now()->subYears(random_int(5, 20))->subDays(random_int(1, 365)),
            ]);
        }

        // Get IDs for foreign keys
        $employeeIds = Employee::pluck('id')->toArray();
        $categoryIds = MailCategory::pluck('id')->toArray();
        $typeIds = MailType::pluck('id')->toArray();

        // Create Incoming Mails
        for ($i = 1; $i <= 20; $i++) {
            IncomingMail::create([
                'mail_number' => 'SM/' . str_pad((string)$i, 3, '0', STR_PAD_LEFT) . '/' . date('Y'),
                'sender_number' => random_int(100, 999) . '/XXX/' . date('Y'),
                'mail_date' => now()->subDays(random_int(1, 30)),
                'received_date' => now()->subDays(random_int(0, 25)),
                'sender' => ['Kementerian Dalam Negeri', 'DPRD Provinsi', 'PT. ABC Indonesia', 'Universitas Negeri'][array_rand(['Kementerian Dalam Negeri', 'DPRD Provinsi', 'PT. ABC Indonesia', 'Universitas Negeri'])],
                'subject' => ['Undangan Rapat Koordinasi', 'Laporan Pelaksanaan Kegiatan', 'Permohonan Data Statistik'][array_rand(['Undangan Rapat Koordinasi', 'Laporan Pelaksanaan Kegiatan', 'Permohonan Data Statistik'])],
                'content' => 'Konten surat masuk nomor ' . $i,
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'type_id' => $typeIds[array_rand($typeIds)],
                'status' => ['pending', 'processed', 'archived'][array_rand(['pending', 'processed', 'archived'])],
                'received_by' => $employeeIds[array_rand($employeeIds)],
                'notes' => 'Catatan surat masuk nomor ' . $i,
            ]);
        }

        // Create Outgoing Mails
        for ($i = 1; $i <= 15; $i++) {
            OutgoingMail::create([
                'mail_number' => 'SK/' . str_pad((string)$i, 3, '0', STR_PAD_LEFT) . '/' . date('Y'),
                'mail_date' => now()->subDays(random_int(1, 30)),
                'recipient' => ['Kementerian Keuangan', 'Walikota Bandung', 'PT. Contractor Indonesia'][array_rand(['Kementerian Keuangan', 'Walikota Bandung', 'PT. Contractor Indonesia'])],
                'subject' => ['Laporan Kegiatan Bulanan', 'Permohonan Anggaran Tambahan', 'Surat Keterangan Aktif'][array_rand(['Laporan Kegiatan Bulanan', 'Permohonan Anggaran Tambahan', 'Surat Keterangan Aktif'])],
                'content' => 'Konten surat keluar nomor ' . $i,
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'type_id' => $typeIds[array_rand($typeIds)],
                'status' => ['draft', 'sent', 'archived'][array_rand(['draft', 'sent', 'archived'])],
                'created_by' => $employeeIds[array_rand($employeeIds)],
                'approved_by' => $employeeIds[array_rand($employeeIds)],
                'sent_at' => now()->subDays(random_int(0, 20)),
                'notes' => 'Catatan surat keluar nomor ' . $i,
            ]);
        }

        // Create Dispositions
        $incomingMailIds = IncomingMail::pluck('id')->toArray();
        
        foreach ($incomingMailIds as $mailId) {
            if (random_int(0, 1)) { // 50% chance to create disposition
                Disposition::create([
                    'incoming_mail_id' => $mailId,
                    'from_employee_id' => $employeeIds[array_rand($employeeIds)],
                    'to_employee_id' => $employeeIds[array_rand($employeeIds)],
                    'type' => ['for_action', 'for_information'][array_rand(['for_action', 'for_information'])],
                    'instruction' => ['Untuk ditindaklanjuti sesuai prosedur', 'Mohon dipelajari dan dilaporkan', 'Segera ditindaklanjuti'][array_rand(['Untuk ditindaklanjuti sesuai prosedur', 'Mohon dipelajari dan dilaporkan', 'Segera ditindaklanjuti'])],
                    'priority' => ['normal', 'high', 'urgent'][array_rand(['normal', 'high', 'urgent'])],
                    'due_date' => now()->addDays(random_int(7, 30)),
                    'status' => ['pending', 'in_progress', 'completed'][array_rand(['pending', 'in_progress', 'completed'])],
                    'received_at' => now()->subDays(random_int(0, 5)),
                ]);
            }
        }

        // Create Announcements
        for ($i = 1; $i <= 5; $i++) {
            Announcement::create([
                'title' => ['Pengumuman Libur Nasional', 'Sosialisasi Kebijakan Baru', 'Info Workshop Pengembangan SDM'][array_rand(['Pengumuman Libur Nasional', 'Sosialisasi Kebijakan Baru', 'Info Workshop Pengembangan SDM'])],
                'content' => 'Konten pengumuman nomor ' . $i . '. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'type' => ['general', 'urgent', 'event'][array_rand(['general', 'urgent', 'event'])],
                'priority' => ['normal', 'high', 'urgent'][array_rand(['normal', 'high', 'urgent'])],
                'is_published' => true,
                'published_at' => now()->subDays(random_int(0, 10)),
                'expires_at' => now()->addDays(random_int(30, 90)),
                'created_by' => $employeeIds[array_rand($employeeIds)],
            ]);
        }
    }
}
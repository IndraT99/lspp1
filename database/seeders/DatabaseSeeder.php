<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Scheme;
use App\Models\Assessment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin
        // Create Admin (School)
        User::updateOrCreate(
            ['email' => 'admin@smkn2kra.sch.id'],
            [
                'identity_number' => '198501012010011001',
                'name' => 'Administrator LSP',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $this->call([
            AdminSeeder::class,
        ]);

        // Create Scheme: Rekayasa Perangkat Lunak
        // Create Scheme: Rekayasa Perangkat Lunak
        $schemeRPL = Scheme::updateOrCreate(
            ['code' => 'KKNI-II-RPL'],
            [
                'name' => 'Rekayasa Perangkat Lunak',
                'description' => 'Skema sertifikasi kualifikasi level II pada kompetensi keahlian Rekayasa Perangkat Lunak.',
                'is_active' => true,
            ]
        );

        // Create Scheme: Teknik Pemesinan
        // Create Scheme: Teknik Pemesinan
        Scheme::updateOrCreate(
            ['code' => 'KKNI-II-TPM'],
            [
                'name' => 'Teknik Pemesinan',
                'description' => 'Skema sertifikasi kualifikasi level II pada kompetensi keahlian Teknik Pemesinan.',
                'is_active' => true,
            ]
        );

        // Create Scheme: Teknik Pembuatan Kain/Tekstil
        // Create Scheme: Teknik Pembuatan Kain/Tekstil
        Scheme::updateOrCreate(
            ['code' => 'KKNI-II-TPK'],
            [
                'name' => 'Teknik Pembuatan Kain',
                'description' => 'Skema sertifikasi kualifikasi level II pada kompetensi keahlian Teknik Pembuatan Kain/Tekstil.',
                'is_active' => true,
            ]
        );

        // Create Scheme: Teknik Ototronik
        // Create Scheme: Teknik Ototronik
        Scheme::updateOrCreate(
            ['code' => 'KKNI-II-TO'],
            [
                'name' => 'Teknik Ototronik',
                'description' => 'Skema sertifikasi kompetensi keahlian Teknik Ototronik.',
                'is_active' => true,
            ]
        );

        // Create Student User (Competent)
        $student = User::updateOrCreate(
            ['email' => 'ahmad@siswa.com'],
            [
                'identity_number' => '2023001',
                'name' => 'Ahmad Siswa',
                'password' => Hash::make('password'),
                'role' => 'asesi',
            ]
        );

        // Create Competent Assessment
        Assessment::updateOrCreate(
            ['certificate_number' => 'LSP-P1/2026/0001'],
            [
                'user_id' => $student->id,
                'scheme_id' => $schemeRPL->id,
                'schedule_date' => Carbon::now()->subMonths(1),
                'status' => 'completed',
                'final_result' => 'K',
                'issue_date' => Carbon::now()->subMonths(1),
            ]
        );
    }
}

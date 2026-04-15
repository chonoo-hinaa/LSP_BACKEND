<?php

namespace Database\Seeders;

use App\Models\Asesor;
use Illuminate\Database\Seeder;

class AsesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample data dengan data hardcoded
        Asesor::create([
            'nama_lengkap' => 'Dr. Irfan Hamdani',
            'no_MET' => 'MET-001001',
            'akun' => 'irfan_hamdani',
            'status' => 'aktif',
            'foto' => null,
        ]);

        Asesor::create([
            'nama_lengkap' => 'Prof. Bambang Sudibyo',
            'no_MET' => 'MET-001002',
            'akun' => 'bambang_sudibyo',
            'status' => 'aktif',
            'foto' => null,
        ]);

        Asesor::create([
            'nama_lengkap' => 'Ing. Hendri Suryanto',
            'no_MET' => 'MET-001003',
            'akun' => 'hendri_suryanto',
            'status' => 'aktif',
            'foto' => null,
        ]);

        Asesor::create([
            'nama_lengkap' => 'Dra. Ratna Sari',
            'no_MET' => 'MET-001004',
            'akun' => 'ratna_sari',
            'status' => 'aktif',
            'foto' => null,
        ]);

        Asesor::create([
            'nama_lengkap' => 'M. Rizki Maulana',
            'no_MET' => 'MET-001005',
            'akun' => 'rizki_maulana',
            'status' => 'nonaktif',
            'foto' => null,
        ]);

        Asesor::create([
            'nama_lengkap' => 'Sri Wahyuni',
            'no_MET' => 'MET-001006',
            'akun' => 'sri_wahyuni',
            'status' => 'aktif',
            'foto' => null,
        ]);

        // Generate additional data menggunakan factory - 3 aktif, 2 nonaktif
        Asesor::factory(3)->aktif()->create();
        Asesor::factory(2)->nonaktif()->create();
    }
}

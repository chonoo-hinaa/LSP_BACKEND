<?php

namespace Database\Seeders;

use App\Models\Asesi;
use Illuminate\Database\Seeder;

class AsesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample data dengan data hardcoded
        Asesi::create([
            'no_peserta' => 'ASI001',
            'nama' => 'Budi Santoso',
            'kelas' => 'XII RPL',
            'tahun_aktif' => 2026,
            'nama_pengguna' => 'budi_santoso',
            'foto' => null,
        ]);

        Asesi::create([
            'no_peserta' => 'ASI002',
            'nama' => 'Siti Nurhaliza',
            'kelas' => 'XII BKP',
            'tahun_aktif' => 2026,
            'nama_pengguna' => 'siti_nurhaliza',
            'foto' => null,
        ]);

        Asesi::create([
            'no_peserta' => 'ASI003',
            'nama' => 'Ahmad Wijaya',
            'kelas' => 'XII TKJ',
            'tahun_aktif' => 2026,
            'nama_pengguna' => 'ahmad_wijaya',
            'foto' => null,
        ]);

        Asesi::create([
            'no_peserta' => 'ASI004',
            'nama' => 'Rina Dewi',
            'kelas' => 'XII MM',
            'tahun_aktif' => 2026,
            'nama_pengguna' => 'rina_dewi',
            'foto' => null,
        ]);

        Asesi::create([
            'no_peserta' => 'ASI005',
            'nama' => 'Doni Pratama',
            'kelas' => 'XII RPL',
            'tahun_aktif' => 2025,
            'nama_pengguna' => 'doni_pratama',
            'foto' => null,
        ]);

        // Generate additional data menggunakan factory
        Asesi::factory(15)->create();
    }
}

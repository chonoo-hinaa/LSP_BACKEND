<?php

namespace App\Imports;

use App\Models\Asesi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AsesiImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Asesi([
            'no_peserta'   => $row['no_peserta'] ?? null,
            'nama'         => $row['nama'] ?? null,
            'kelas'        => $row['kelas'] ?? null,
            'tahun_aktif'  => $row['tahun_aktif'] ?? date('Y'),
            'nama_pengguna' => $row['nama_pengguna'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'no_peserta'    => 'required|unique:asesi,no_peserta',
            'nama'          => 'required|string|max:255',
            'kelas'         => 'required|string|max:255',
            'tahun_aktif'   => 'required|integer|min:2000|max:2100',
            'nama_pengguna' => 'required|unique:asesi,nama_pengguna',
        ];
    }
}

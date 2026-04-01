<?php

namespace App\Imports;

use App\Models\Asesor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AsesorImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        return new Asesor([
            'nama_lengkap' => $row['nama_lengkap'] ?? null,
            'no_MET'       => $row['no_met'] ?? null,
            'akun'         => $row['akun'] ?? null,
            'status'       => $row['status'] ?? 'aktif',
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_lengkap' => 'required|string|max:255',
            'no_met'       => 'required|string|max:50',
            'akun'         => 'required|string|max:255',
            'status'       => 'required|in:aktif,nonaktif',
        ];
    }
}
